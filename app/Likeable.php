<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

trait Likeable 
{
    public function scopeWithLikes(Builder $query){
        $query->leftJoinSub('select post_id, sum(liked)likes, sum(!liked) dislike from Likes group by post_id',
      'likes',
      'likes.post_id',
      'posts.id'
    );
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }
    public function like($user=null,$like=true){
         $this->likes()->updateOrCreate([
             'user_id'=>$user ? $user->id : auth()->id()],[
             'liked'=> $like,
         ]);
        }
             public function dislike($user=null){
                 return $this->$like($user,false);
                
             }
    public function isLikedBy(User $user){
       return (bool) $this->likes
                                ->where('post_id',$this->id)
                                ->where('liked',true)
                                ->count();
    }
    public function isDislikedBy(User $user){
        return (bool) $this->likes
                                 ->where('post_id',$this->id)
                                 ->where('liked',false)
                                 ->count();
     }









}