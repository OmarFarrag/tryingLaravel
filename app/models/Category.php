<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Returns all the posts that belong to a specific character
    public function posts(){
        // A single category has many posts
        return $this->hasMany('App\models\post');
    }
}
