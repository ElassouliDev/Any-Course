<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
//update commit github
    use SoftDeletes;
    protected $fillable =['name'];
//    public function posts()
//    {
//        return $this->morphedByMany('App\Post', 'taggable');
//    }
}