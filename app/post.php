<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{ use Likeable;
    protected $guarded=[];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getTitleAttribute($title){
             return ucfirst($title);
         }
         public function getContentAttribute($content){
            return ucfirst($content);
        }
        
}
