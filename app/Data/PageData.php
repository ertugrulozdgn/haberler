<?php

namespace App\Data;

use App\Models\Page;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class PageData
{
    public static function get($slug): ?Page
    {
        return Cache::tags('pages')->remember('page_' . $slug, 60, function () use ($slug) {
            return Page::active()->whereShowInFooter(1)->whereSlug($slug)->first(); 
        });
    }

    public static function footer(): Collection
    {
        return Cache::tags('pages')->rememberForever('footer', function () {
            return Page::active()->where('show_in_footer', 1)->get();
        });
    }
}