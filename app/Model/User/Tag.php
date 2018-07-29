<?php

namespace App\Model\User;

//use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function posts(){

        return $this->belongsToMany(Blog::class, 'blog_tags')->orderBy('created_at','DESC')->paginate(6);

    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
