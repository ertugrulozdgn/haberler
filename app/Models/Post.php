<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Jenssegers\Date\Date;
use Storage;

class Post extends Model
{

    use SoftDeletes;

   protected $dates = ['deleted_at', 'published_at'];


    //Relationships
    public function user()
    {
        return $this->hasOne(User::class,'id','created_by');
    }

    // public function created_user()
    // {
    //     return $this->hasOne(User::class,'id','created_by');
    // }


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
        return $this->belongsToMany(Category::class, 'category_post', 'post_id', 'category_id');
    }

    //Attributes
    public function getCreatedByNameAttribute()
    {
        return $this->user->name;
        //return User::where('id', $this->created_by)->first()->name;
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
        if(!empty($this->cover_img)) {
            return env('APP_URL') . $this->cover_img->public_path;
        }
    }

    public function getHeadlineImageAttribute()
    {
        if(!empty($this->headline_img)) {
            return env('APP_URL') . $this->headline_img->public_path;
        }
    }

    public function getEditLinkAttribute()
    {
        switch ($this->post_type) {
            case 0:
                return action('Cms\Post\NewsController@edit', [$this->id]);
                break;
            case 1:
                return action('Cms\Post\GalleryController@edit', [$this->id]);
                break;
        }
    }

    public function getDeleteLinkAttribute()
    {
        switch ($this->post_type) {
            case 0:
                return action('Cms\Post\NewsController@destroy', [$this->id]);
                break;
            case 1:
                return action('Cms\Post\GalleryController@destroy', [$this->id]);
                break;
        }
    }

    public function getLinkAttribute()
    {
        if(!empty($this->redirect_link)) {
            return $this->redirect_link;
        }

        return  action('Web\Post\PostController@show', [$this->slug, $this->id]);
    }



    //scopes
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeShowMainPage($query)
    {
        return $query->where('show_on_mainpage', 1);
    }



    //Functions
    public function attachment($attachment_type)
    {
        $file_name = $this->slug. '_' . $attachment_type. '_' . uniqid(). '.' .request()->$attachment_type->getClientOriginalExtension();
        $storage_path = request()->$attachment_type->storeAs('file/images/' . date('Y/m/d'), $file_name);

        $attachment = new Attachment();
        $attachment->type = $attachment_type;
        $attachment->mime_type = request()->$attachment_type->getClientOriginalExtension();
        $attachment->file_name = $file_name;
        $attachment->storage_path = $storage_path;
        $attachment->public_path = '/storage/' . $storage_path;
        $attachment->width = getimagesize(request()->file($attachment_type))[0];
        $attachment->height = getimagesize(request()->file($attachment_type))[1];
        $attachment->save();

        return $attachment->id;

        // $this->$column = $attcehmentent->id;
        // $post->cover_id = $attcehmentent->id;
    }
}
