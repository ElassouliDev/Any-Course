<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['title_en','title_ar','description_en','description_ar','parent'];

    public function course(){
        return $this->hasMany(Course::class);
    } // end of get course that have a course
     public function subCategories(){
        return $this->hasMany(Category::class,'parent','id');
    } // end of get course that have a course
}
