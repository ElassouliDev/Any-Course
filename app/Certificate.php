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
    public function user()
    {
        return $this->belongsTo(User::class);
    }//end of get file Certificate

     public function course()
    {
        return $this->belongsTo(Course::class);
    }//end of get file Certificate

}
