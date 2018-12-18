<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    // Returns the commenter object
    public function commenter(){
        return $this->belongsTo('App\User');
    }
}
