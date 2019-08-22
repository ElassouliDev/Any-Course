<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //create read update delete
        //role profile
        $this->middleware(['permission:update_profile'])->only('update_profile');
        $this->middleware(['permission:read_profile'])->only('profile');

        // role user
        $this->middleware(['permission:read_users'])->only('index');
        $this->middleware(['permission:create_users'])->only('create');
        $this->middleware(['permission:update_users'])->only('edit');
        $this->middleware(['permission:delete_users'])->only('destroy');

    }//end of constructor
    public function index(Request $request)
    {

        $categories = Category::where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {

                return $query->where('title_en', 'like', '%' . $request->search . '%')
                    ->orWhere('description_en', 'like', '%' . $request->search . '%');

            });

        })->latest()->paginate(5);
        $title = trans('admin.category');
        return view('dashboard.category.index', compact('title','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = trans('admin.category');
        return view('dashboard.category.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|max:255',
            'title_ar' => 'required|max:255',
            'description_ar' => 'required',
            'description_en' => 'required',

        ]);

       Category::create($request->all());

        session()->flash('success', __('error.added_successfully'));
        return redirect()->route('dashboard.category.index');
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
    public function edit(Category $category)
    {
        $title = trans('admin.edit');
        return view('dashboard.category.edit', compact('title','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title_en' => 'required|max:255',
            'title_ar' => 'required|max:255',
            'description_ar' => 'required',
            'description_en' => 'required',

        ]);

        $category->update($request->all());

        session()->flash('success', __('error.updated_successfully'));
        return redirect()->route('dashboard.category.index');
    }

    /**

     */
    public function destroy(Category $category)
    {
       $category->delete();
    }
}
