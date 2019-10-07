<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Course;
use App\DataTables\CourseDataTable;
use App\File;
use App\Http\Controllers\BaseController;
use App\Http\Requests\CourseRequest;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class CourseController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CourseDataTable $course)
    {
        $title=trans('admin.index');
        $courses = Course::latest()->paginate(10);
//        return view('dashboard.course.index',compact('title','courses'));
        return $course->render('dashboard.course.index', ['title' => trans('admin.courses')]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $title= trans('admin.create');
        $categories = Category::all();
        $mainCategories = $categories->where('parent', 0);
        $subCategories = $categories->where('parent', '<>', 0);
        $tags = Tag::all();
        return view('dashboard.course.create',
            compact('title','mainCategories','subCategories','tags'));
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


        $course= Course::create($courseData);
        $course->tags()->attach($courseRequest->tags);
        if($courseRequest->file('image'))
        {
            $image = new File();
            $image->file_path = $this->uploadImage($courseRequest);
            $course->image()->save($image);
        }


        session()->flash('success', __('error.added_successfully'));
        return redirect()->route('dashboard.course.index');

    }

    function uploadImage($image,$edit=null){
        if($edit!=null)
        Storage::has($edit->image->file_path) ? Storage::delete($edit->image->file_path) : '';

        $file = $image->file('image')->store('image/courses');
        return $file;

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('dashboard.course.show',
            compact('course'));
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
        $tags = Tag::all();

        return view('dashboard.course.edit',compact('title','course','categories','tags'));
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
              $image = $course->image()->update([
                  'file_path'=>$this->uploadImage($courseRequest,$course)
              ]);


          }
//          return dd($courseRequest->tags);
        $course->tags()->attach($courseRequest->tags);
        session()->flash('success', __('error.updated_successfully'));
        return redirect()->route('dashboard.course.index');
    }


    public function destroy(Course $course)
    {
        Storage::has($course->image->file_path) ? Storage::delete($course->image->file_path) : '';
        $course->delete();
        session()->flash('success', __('error.deleted_successfully'));
        return redirect()->route('dashboard.course.index');
    }
}
