<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends BaseModel
{
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function cover_img()
    {
        return $this->hasOne(Attachment::class, 'cover_id');
    }

    public function headline_img()
    {
        return $this->hasOne(Attachment::class, 'headline_id');
    }
}
