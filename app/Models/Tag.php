<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = ['name', 'slug'];

    public $timestamps = false;

    

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getLinkAttribute() 
    {
        return action('Web\Post\PostController@tag', [$this->slug]);
    }
}
