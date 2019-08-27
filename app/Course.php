<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    protected $fillable=['user_id','title_ar','title_en','description_en','description_ar','category_id',
        'status','is_paid','price'];

    public function image()
    {
            return $this->morphOne(File::class,'fileable');
    }//end of get image course

   public function tags()
    {
            return $this->morphToMany(Tag::class,'taggable');
    }//end of get tags course

     public function user()
    {
            return $this->belongsTo(User::class);
    }//end of get user that have a course

    public function lessons(){
        return $this->hasMany(Lesson::class);
    } // end of get lessons that have a course
    public function category(){
        return $this->belongsTo(Category::class);
    } // end of get category that have a course
}
