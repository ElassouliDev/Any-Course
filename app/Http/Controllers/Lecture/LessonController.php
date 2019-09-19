<?php

namespace App\Http\Controllers\Lecture;

use App\Category;
use App\Course;
use App\DataTables\Lecture\CourseDataTable;
use App\File;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\View\LessonRequest;
use App\Lesson;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{
    public function index($slug)
    {
        /*$courses = Course::latest()->paginate(10);*/
        $id = Course::where('slug_' . app()->getLocale(), $slug)->first()->id;
        $course = Course::find($id);
        $title = trans('admin.lesson');
        return view('lecture.lesson.index', compact('title', 'course'));
    }


    public function store(LessonRequest $request)
    {

        $request['user_id'] = auth()->id();
        $lesson = Lesson::create($request->all());
        if ($request->file('file_path')) {
            $image = new File();
            $image->file_path = $this->uploadImage($request);
            $lesson->image()->save($image);
        }


        return back();
    }


    function uploadImage($image, $edit = null)
    {
        if ($edit != null)
            Storage::has($edit->image->file_path) ? Storage::delete($edit->image->file_path) : '';

        $file = $image->file('image')->store('image/courses');
        return $file;

    }

    public function show($course_id)
    {
        $course = Course::find($course_id);
        $categories = Category::where('parent', 0)->get();
        $tags = Tag::all();

        $tags_course = $course->tags()->pluck('tag_id')->toArray();
        $show = view('lecture.course.show', compact('course', 'categories', 'tags', 'tags_course'))->render();
        return response(['status' => true, 'show' => $show]);
    }

    public function edit($course_id)
    {

        $course = Course::find($course_id);
        $categories = Category::where('parent', 0)->get();
        $tags = Tag::all();

        $tags_course = $course->tags()->pluck('tag_id')->toArray();
        $show = view('lecture.course.edit', compact('course', 'categories', 'tags', 'tags_course'))->render();

        return response(['status' => true, 'show' => $show]);
    }

    public function update(LessonRequest $request, $slug)
    {
        $lesson = Lesson::where('slug_' . app()->getLocale(), $slug)->first()->id;

        $lesson->update($request->all());


        return back();
    }

    public function destroy($slug)
    {
        $lesson = Lesson::where('slug_' . app()->getLocale(), $slug)->first()->id;

        $lesson->delete();


        return back();
    }


}
