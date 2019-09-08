<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['title_en','title_ar','user_id','lesson_id'];
    function option_exam(){
        return $this->hasMany(Option_exam::class);
    }
}
