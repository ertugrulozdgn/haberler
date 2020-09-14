<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Storage;

class Post extends Model
{

    use SoftDeletes;

   protected $dates = ['deleted_at', 'published_at'];

   

    //Relationships
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function cover_img()
    {
        return $this->hasOne(Attachment::class, 'id', 'cover_id');
    }
    
    public function headline_img()
    {
        return $this->hasOne(Attachment::class, 'id', 'headline_id');
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


    public function getCoverImageAttribute()
    {
        return env('APP_URL') . $this->cover_img->public_path;
    }



    public function getHeadlineImageAttribute()
    {
        return env('APP_URL') . $this->headline_img->public_path;
    }

    

    //Functions
    public function attcehmentent($column, $attachment_type)
    {

        $file_name = $this->slug. '_' . $attachment_type. '_' . uniqid(). '.' .request()->$attachment_type->getClientOriginalExtension();
        $storage_path = request()->$attachment_type->storeAs('file/images/' . date('Y/m/d'), $file_name);

        $attcehmentent = new Attachment();
        $attcehmentent->type = $attachment_type;
        $attcehmentent->mime_type = request()->$attachment_type->getClientOriginalExtension();
        $attcehmentent->file_name = $file_name;
        $attcehmentent->storage_path = $storage_path;
        $attcehmentent->public_path = '/storage/' . $storage_path;
        $attcehmentent->width = getimagesize(request()->file($attachment_type))[0];
        $attcehmentent->height = getimagesize(request()->file($attachment_type))[1];
        $attcehmentent->save();

        $this->$column = $attcehmentent->id;
      //$post->cover_id = $attcehmentent->id;
    }
}
