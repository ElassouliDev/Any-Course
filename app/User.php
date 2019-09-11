<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',  'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get first name

    public function getLastNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get last name

    function full_name(){
    return $this->first_name.' '.$this->last_name;
    } // end of get full name (first name and last name)
    public function image()
    {
        return $this->morphOne(File::class,'fileable');
    }//end of get image user

    public function student_course(){
        return $this->belongsToMany(Course::class,'course_student');
    } // end of get user course that have a course

    public function student_watch_lesson(){
        return $this->belongsToMany(Lesson::class,'lesson_student');
    } // end of get user course that have a course

    function question(){
        return $this->hasMany(Question::class);
    }//end of get  lesson questions
    function comment(){
        return $this->hasMany(Comment::class);
    }//end of get  lesson Comment
     function answer(){
        return $this->hasMany(Answer_user::class);
    }//end of get  answer user
}
