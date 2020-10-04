<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\PostSorting;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class PostObserver
{
    public static $old_location = null;
    public static $old_status = null;

    /**
     * Handle the post "created" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function creating(Post $post)
    {
        $post->created_by = Auth::user()->id;
    }

    /**
     * Handle the post "updated" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function updating(Post $post)
    {
        $post->updated_by = Auth::user()->id;
    }

    /**
     * Handle the post "deleted" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        //
    }

    /**
     * Handle the post "restored" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the post "force deleted" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }

    public function defaultAddModel(Post $post)
    {
        $post->short_title = request()->input('short_title');
        $post->location = request()->input('location');
        $post->status = request()->input('status');
        $post->show_on_mainpage = request()->input('show_on_mainpage');
        $post->commentable = request()->input('commentable');
        $post->content = request()->input('content');
        $post->summary = request()->input('summary');
        $post->editor_id = request()->input('editor_id');
        $post->title = request()->filled('title') ? request()->input('title') : request()->input('short_title');
        $post->redirect_link = request()->input('redirect_link') ?? '';
        $post->slug = request()->filled('title') ? Str::slug($post->title) : Str::slug($post->short_title);
        $post->seo_title = request()->filled('seo_title') ? (request()->input('seo_title')) : (request()->filled('title') ? request()->input('title') : request()->input('short_title'));
        $post->published_at = request()->input('published_at');

        if(request()->hasFile('cover_img')) {
            $post->cover_id = $post->attachment('cover_img');
        }
        if(request()->hasFile('headline_img')) {
            $post->headline_id = $post->attachment('headline_img');
        }

        if ((new \Date(request()->input('published_at'))) > (new \Date())) {
            $post->status = 2;
        }
    }

    /**
     * @return null
     */
    public function setHeadline(Post $post)
    {
        if ($post->location == self::$old_location && $post->status == self::$old_status) {
            return true;
        }

        if ($post->location != self::$old_location || $post->status != 1) { //post->location = normal old = manşet // post->location = manşet
            $this->removeHeadline($post);
        }

        if (array_key_exists($post->location, config('haberler.app.sorting_type_limit')) && $post->status == 1 ) {
            $post_sorting = PostSorting::whereLocation($post->location)->whereStatus(1)->first();

            if (empty($post_sorting)) {
                $post_sorting = new PostSorting();
                $post_sorting->location = $post->location;
                $post_sorting->status = 1;
                $post_sorting->posts = json_encode([]);
            }

            $post_ids = json_decode($post_sorting->posts);

            if (!in_array($post->id, $post_ids)) {
                $post_ids = array_merge([$post->id], $post_ids);
                if (count($post_ids) > config('haberler.app.sorting_type_limit')[$post->location]) {
                    array_pop($post_ids);
                }
                $post_sorting->posts = json_encode($post_ids);
            }
            $post_sorting->save();
        }
    }

    public function removerHeadline(Post $post)
    {
        $location = is_null(self::$old_location) ? $post->location : self::$old_location;

        $post_sorting = PostSorting::whereLocation($location)->whereStatus(1)->first();
        $post_ids = json_decode($post_sorting->posts);
        if (in_array($post_ids, $post_ids)) {
            $take_post = array_search($post->id, $post_ids);
            unset($post_ids[$take_post]);
        }
        $post_sorting->save();
    }
}
