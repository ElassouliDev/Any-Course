<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option_exam extends Model
{
    protected $fillable =['value_ar','value_en','is_correct','exam_id'];
   function exam(){
       return $this->belongsTo(Exam::class);
   }
//    function answer(){
//        return $this->hasMany(Answer_user::class);
//    }
}
