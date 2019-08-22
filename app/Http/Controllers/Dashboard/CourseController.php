<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Course;
use App\File;
use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title=trans('admin.index');
        $courses = Course::latest()->paginate(10);
        return view('dashboard.course.index',compact('title','courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $title= trans('admin.create');
        $categories=Category::all();
        return view('dashboard.course.create',
            compact('title','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $courseRequest)
    {
    $courseData= $courseRequest->all();
    $courseData['user_id']=auth()->id();
//dd($courseData);
//         dd($courseRequest->file('image'));
        $image = new File();
        $image->file_path = $this->uploadImage($courseRequest);

        $course= Course::create($courseData);
        $course->image()->save($image);
        session()->flash('success', __('error.added_successfully'));
        return redirect()->route('dashboard.course.index');

    }

    function uploadImage($image){

        $file = $image->file('image');
        $file_Ex = $file->getClientOriginalExtension();
        $filePath = 'storage/';
        $filePath .= $file->storeAs('image/course', 'image_course' . time() . '.' . $file_Ex);
        return $filePath;

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $title=trans('admin.edit');
        $categories=Category::all();

        return view('dashboard.course.edit',compact('title','course','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $courseRequest, Course $course)
    {
        $course->update($courseRequest->all());
          if($courseRequest->hasFile('image')){
              $image = $course->image();
              $image->file_path = $this->uploadImage($courseRequest);
              $image->save();

          }
        session()->flash('success', __('error.updated_successfully'));
        return redirect()->route('dashboard.course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        session()->flash('success', __('error.deleted_successfully'));
        return redirect()->route('dashboard.course.index');
    }
}
