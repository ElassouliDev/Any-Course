<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    protected $fillable=['title_ar','title_en','description_ar','category_id',
        'status','is_paid','price'];

    public function image()
    {
            return $this->morphOne(File::class,'fileable');
    }//end of get image course
}
