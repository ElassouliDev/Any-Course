<?php

namespace App\Http\Controllers\Student;

use App\Certificate;
use App\Comment;
use App\Course;
use App\Http\Controllers\BaseController;
use App\Http\Requests\View\QuestionRequest;
use App\Lesson;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CertificateController extends BaseController
{

 function index(){
        $title = trans('course.certificate');
     $certifications = Certificate::where('user_id',\auth()->id())->get();

     return view('certification.user_certification_list',compact('certifications','title'));
 }
}
