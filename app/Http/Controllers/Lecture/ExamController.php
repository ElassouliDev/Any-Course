<?php

namespace App\Http\Controllers\Lecture;

use App\Category;
use App\Course;
use App\DataTables\Lecture\CourseDataTable;
use App\DataTables\Lecture\ExamDataTable;
use App\Exam;
use App\File;
use App\Http\Requests\CourseRequest;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    public function index(ExamDataTable $exam,$lesson_id)
    {

        $title= trans('admin.exams');
        return $exam->render('lecture.exam.index', compact('title','lesson_id'));
    }


    public function store(Request $courseRequest)
    {
        $courseData= $courseRequest->all();
        $courseData['user_id']=auth()->id();


        $course= Course::create($courseData);
        $course->tags()->attach($courseRequest->tags);
        if($courseRequest->file('image'))
        {
            $image = new File();
            $image->file_path = $this->uploadImage($courseRequest);
            $course->image()->save($image);
        }


        session()->flash('success', __('error.added_successfully'));
        return response(['status'=>true ,'message'=> __('error.added_successfully')]);
    }


    function uploadImage($image,$edit=null){
        if($edit!=null)
            Storage::has($edit->image->file_path) ? Storage::delete($edit->image->file_path) : '';

        $file = $image->file('image')->store('image/courses');
        return $file;

    }

    public function show($course_id)
    {
            $course=Course::find($course_id);
        $categories= Category::where('parent',0)->get();
        $tags = Tag::all();

        $tags_course = $course->tags()->pluck('tag_id')->toArray();
         $show = view('lecture.course.show' ,compact('course','categories','tags','tags_course'))->render();
        return response(['status'=>true , 'show'=>$show]);
    }





}