<?php

namespace App\Models;

use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    //Attributes
    public function getLinkAttribute()
    {
        return action('Web\Post\NewsController@index', [$this->slug]);
    }

    //Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}
