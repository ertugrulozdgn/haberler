<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $timestamps = false;

    //Attribute
    public function getEditLinkAttribute()
    {
        return action('Cms\Admin\SettingController@edit', [$this->id]);
    }
}
