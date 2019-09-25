<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BaseController;
use App\Http\Requests\TagRequest;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends BaseController
{
    //update commit github

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $tags = Tag::where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {

                return $query->where('name_ar', 'like', '%' . $request->search . '%');

            });

        })->latest()->paginate(5);
        $title = trans('admin.tag');
        return view('dashboard.tag.index', compact('title','tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = trans('admin.tag');
        return view('dashboard.tag.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $tagRequest)
    {
        $tagRequest = $tagRequest->all();


        Tag::create($tagRequest);

        session()->flash('success', __('error.added_successfully'));
        return redirect()->route('dashboard.tag.index');
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
    public function edit(Tag $tag)
    {
        $title = trans('admin.tag');
        return view('dashboard.tag.edit', compact('title','tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $tagRequest, Tag $tag)
    {
        $tagRequest = $tagRequest->all();


        $tag->update($tagRequest);

        session()->flash('success', __('error.added_successfully'));
        return redirect()->route('dashboard.tag.index');
    }

    /**


     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
    }
}
