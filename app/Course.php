<?php

namespace App;

use Ghanem\Rating\Traits\Ratingable as Rating;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Notifications\Notifiable;

class Course extends Model
{
    use Sluggable;
    use Rating;
    use SoftDeletes;
    use Notifiable;
    protected $fillable = ['user_id', 'title_ar', 'title_en', 'description_en', 'description_ar', 'category_id',
        'status', 'is_paid', 'price'];

    protected $attributes = [
        'price' => 0
    ];
    public function sluggable()
    {
        return [
            'slug_ar' => [
                'source' => 'title_ar'
            ],
            'slug_en' => [
                'source' => 'title_en'
            ]
        ];
    }

    public function image()
    {
        return $this->morphOne(File::class, 'fileable');
    }//end of get image course

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }//end of get tags course

    public function user()
    {
        return $this->belongsTo(User::class);
    }//end of get user that have a course

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    } // end of get lessons that have a course

    public function category()
    {
        return $this->belongsTo(Category::class);
    } // end of get category that have a course

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_student')->withPivot('user_id');
    } // end of get user course that have a course,

    /*  public function student()
      {
          return $this->hasManyThrough(User::class, 'course_student');
      } */// end of get user course that have a course

    public function exams()
    {
        return $this->hasMany(Exam::class);
    } // end of get course exam

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

  public function certifications()
    {
        return $this->belongsToMany(User::class,'certificates');
    }


}
