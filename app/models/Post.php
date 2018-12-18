<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{   
    // Returns the category the post belongs to
    public function getCategory(){
        return $this->belongsTo('App\models\Category');
    }

    // Returns the category the post belongs to
    public function getAuthor(){
        return $this->belongsTo('App\User');
    }

    public function comment(){
        return $this->hasMany('App\models\Comment');
    }
}
