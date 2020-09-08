<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

class Post extends BaseModel
{

    //Relationships
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

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }



    //Attributes
    public function getCreatedByNameAttribute()
    {
        return User::where('id', $this->created_by)->first()->name;
    }

    public function getLocationNameAttribute()
    {
        switch ($this->location)
        {
            case 1:
                return 'Normal';
                break;

            case 2:
                return 'Manşet';
                break;

            case 3:
                return 'Sürmanşet';

            default:
                return 'normal';
                break;
        }
    }

}
