<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use SoftDeletes;
    protected $fillable = ['title_ar','title_en','description_ar','description_en','course_id','user_id'];
    protected $hidden = ['deleted_at'];

    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function file(){
        return $this->morphOne(File::class,'fileable');
    }
}
