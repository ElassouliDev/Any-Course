<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title','content','user_id','lesson_id'];

    function user(){
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->morphMany(Comment::class,'commentable');
    }//end of get comment lesson



}
