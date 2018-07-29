<?php

namespace App\Model\User;

//use Illuminate\Database\Eloquent\Model;

use App\Model\Admin\Admin;

class Blog extends Model
{

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tags(){

        return $this->belongsToMany(Tag::class, 'blog_tags')->withTimestamps();

    }

    public function photo(){

        return $this->belongsTo(Photo::class);

    }

    public function admin(){

        return $this->belongsTo(Admin::class);

    }


}
