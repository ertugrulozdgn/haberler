<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
