<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['title_ar','title_en','description_ar','description_en','course_id','user_id'];
}
