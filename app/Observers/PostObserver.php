<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\PostSorting;

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
    public function created(Post $post)
    {
        //
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

    public function setHeadline(Post $post)
    {
        // if($post->location != 1 && $post->status == 1) {
        //     $post_sorting = PostSorting::whereLocation($post->location)->first();

        //     $post_ids = json_decode($post_sorting->posts);
            
        //     if (!in_array($post->id, $post_ids)) { // post, sorting de yoksa
        //         $post_ids = array_merge([$post->id], $post_ids); // sorting->posts'a post'u ekle
        //         if (count($post_ids) > config('haberler.app.sorting_type_limit')[$post->location]) { // sorting posts limiti dolduysa postu ekleyince sonrakini çıkar
        //             array_pop($post_ids);
        //         }
        //         $post_sorting->posts = json_encode($post_ids);
        //         $post_sorting->save();
        //     }
        // } else {
            
        // }
    }
}
