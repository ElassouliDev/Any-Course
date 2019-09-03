<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\DataTables\CategoryDataTable;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function __construct()
    {

                // role category create read update delete
        $this->middleware(['permission:read_categories'])->only('index');
        $this->middleware(['permission:create_categories'])->only('create');
        $this->middleware(['permission:update_categories'])->only('edit');
        $this->middleware(['permission:delete_categories'])->only('destroy');

    }//end of constructor
    public function index(CategoryDataTable $category)
    {


        $title = trans('admin.category');
        return $category->render('dashboard.category.index', ['title' => trans('admin.categories')]);

    }


    public function create()
    {
        $title = trans('admin.category');
        $parents = Category::where('parent',0)->get();
        return view('dashboard.category.create', compact('title','parents'));
    }


    public function store(CategoryRequest $categoryRequest)
    {
        $categoryRequest = $categoryRequest->all();

       Category::create($categoryRequest);

        session()->flash('success', __('error.added_successfully'));
        return redirect()->route('dashboard.category.index');
    }


    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        $title = trans('admin.edit');
        $parents = Category::where('parent',0)->get();

        return view('dashboard.category.edit', compact('title','category','parents'));
    }


    public function update(CategoryRequest $categoryRequest, Category $category)
    {

    $categoryRequest = $categoryRequest->all();
        $category->update($categoryRequest);
        session()->flash('success', __('error.updated_successfully'));
    return redirect()->route('dashboard.category.index');
    }


    public function destroy(Category $category)
    {
       $category->delete();
    }
}
