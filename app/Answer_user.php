<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer_user extends Model
{
    protected $fillable = ['user_id','option_exam_id'];
    function user(){
        return $this->belongsTo(User::class);
    }
    function answer(){
        return $this->belongsTo(Option_exam::class);
    }
}
