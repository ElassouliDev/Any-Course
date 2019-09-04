<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title_en','title_ar','content_ar','content_en','user_id','lesson_id'];
}
