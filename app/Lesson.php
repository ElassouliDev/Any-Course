<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Lesson extends Model
{

    use SoftDeletes;

    use Sluggable;
    protected $fillable = ['title_ar','title_en','course_id','user_id'];
    protected $hidden = ['deleted_at'];
    public function sluggable()
    {
        return [
            'slug_ar' => [
                'source' => 'title_ar'
            ] ,
            'slug_en' => [
                'source' => 'title_en'
            ]
        ];
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function file(){
        return $this->morphOne(File::class,'fileable');
    }

    public function student_watch_lesson(){
        return $this->belongsToMany(User::class,'lesson_student');
    } // end of get user course that have a course
    public function comment()
    {
        return $this->morphMany(Comment::class,'commentable');
    }



}
