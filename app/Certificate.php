<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = ['user_id','course_id','degree'];

    public function file()
    {
        return $this->morphOne(File::class, 'fileable');
    }//end of get file Certificate
}
