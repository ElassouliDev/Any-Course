<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
//update commit github
    use SoftDeletes;
    protected $fillable =['name_en','name_ar'];
//    public function posts()
//    {
//        return $this->morphedByMany('App\Post', 'taggable');
//    }


    public function course(){
        return $this->morphedByMany(Course::class, 'taggable');
    }
}
