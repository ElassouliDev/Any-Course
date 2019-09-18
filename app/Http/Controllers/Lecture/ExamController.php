<?php

namespace App\Http\Controllers\Lecture;

use App\Category;
use App\Course;
use App\DataTables\Lecture\CourseDataTable;
use App\DataTables\Lecture\ExamDataTable;
use App\Exam;
use App\File;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\View\ExamRequest;
use App\Option_exam;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    public function index(ExamDataTable $exam,$slug)
    {

        $title= trans('admin.exams');
        return $exam->render('lecture.exam.index', compact('title','slug'));
    }


    public function store(ExamRequest $request ,$slug)
    {
        $course = Course::where('slug_'.app()->getLocale(),$slug)->first()->id;
        $exam = Exam::create([
            'title_en'=>$request->title_en,
            'title_ar'=>$request->title_ar,
            'course_id'=>$course,
            'user_id'=>auth()->id(),
        ]);
        $array = [];
        foreach ($request->value_en as $key=>$value){
        $option = new Option_exam();
        $option['value_ar']=$request->value_ar[$key];
        $option['value_en']=$value;
        $option['is_correct']= $request->is_correct == $key ? true:false;
        $array[]=$option;
        }
        $exam->option_exam()->saveMany($array);



        return response(['status'=>true ,'message'=> __('error.added_successfully')]);
    }


    function uploadImage($image,$edit=null){
        if($edit!=null)
            Storage::has($edit->image->file_path) ? Storage::delete($edit->image->file_path) : '';

        $file = $image->file('image')->store('image/courses');
        return $file;

    }

    public function show($slug)
    {
        $course = Course::where('slug_'.app()->getLocale(),$slug)->first();
        $categories= Category::where('parent',0)->get();
        $tags = Tag::all();

        $tags_course = $course->tags()->pluck('tag_id')->toArray();
         $show = view('lecture.course.show' ,compact('course','categories','tags','tags_course'))->render();
        return response(['status'=>true , 'show'=>$show]);
    }
    public function edit($slug)
    {
        $course = Course::where('slug_'.app()->getLocale(),$slug)->first();
        $categories= Category::where('parent',0)->get();
        $tags = Tag::all();

        $tags_course = $course->tags()->pluck('tag_id')->toArray();
        $show = view('lecture.course.show' ,compact('course','categories','tags','tags_course'))->render();
        return response(['status'=>true , 'show'=>$show]);
    }
    public function destroy($slug)
    {
        $course = Course::where('slug_'.app()->getLocale(),$slug)->first();
        $categories= Category::where('parent',0)->get();
        $tags = Tag::all();

        $tags_course = $course->tags()->pluck('tag_id')->toArray();
        $show = view('lecture.course.show' ,compact('course','categories','tags','tags_course'))->render();
        return response(['status'=>true , 'show'=>$show]);
    }




}
