<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostObserver
{
    /**
     * Handle the post "created" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function creating(Post $post)
    {
        // $post->post_type = 0;
        // $post->short_title = request()->input('short_title');
        // $post->location = request()->input('location');
        // $post->show_on_mainpage = request()->input('show_in_mainpage');
        // $post->commentable = request()->input('commentable');
        // $post->created_by = Auth::user()->id;
        // $post->content = request()->input('content');
        // $post->summary = request()->input('summary');
        // $post->status = request()->input('status');
        // $post->editor_id = request()->input('editor_id');
        // $post->title = request()->filled('title') ? request()->input('title') : request()->input('short_title');
        // $post->redirect_link = request()->input('redirect_link') ?? '';
        // $post->slug = request()->filled('title') ? Str::slug($post->title) : Str::slug($post->short_title);
        // $post->seo_title = request()->filled('seo_title') ? (request()->input('seo_title')) : (request()->filled('title') ? request()->input('title') : request()->input('short_title'));
        // $post->attcehmentent('cover_id', 'cover_img');
        // if(request()->hasFile('headline_img'))
        // {
        //     $post->attcehmentent('headline_id', 'headline_img');
        // }
    }

    /**
     * Handle the post "updated" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        //
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
}
