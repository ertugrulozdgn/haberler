<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function getShowInFooterNameAttribute()
    {
        $show_in_footer = [
            0 => 'Gösterme',
            1 => 'Göster'
        ];

        return $show_in_footer[$this->show_in_footer] ?? 'Göster';
    }

    //attributes
    public function getLinkAttribute()
    {
        return action('Web\PageController@show', [$this->slug]);
    }

    //scopes
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
