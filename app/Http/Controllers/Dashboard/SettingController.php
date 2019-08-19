<?php

namespace App\Http\Controllers\Dashboard;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */

        public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_settings'])->only('index');
        $this->middleware(['permission:create_settings'])->only('create');
        $this->middleware(['permission:update_settings'])->only('edit');
        $this->middleware(['permission:delete_settings'])->only('destroy');

    }//end of constructor
     
    public function index(Request $request)
    {
        $title = trans('admin.settings');
        $settings = Setting::where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {

                return $query->where('key', 'like', '%' . $request->search . '%')
                    ->orWhere('value', 'like', '%' . $request->search . '%');

            });

        })->latest()->paginate(5);
        return view('dashboard.settings.index',compact('title','settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = trans('admin.create_setting');
        return view('dashboard.settings.create', compact('title'));
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
            'key'=>'string|required',
            'value'=>'string|required',

        ]);
        $setting = Setting::create(request()->all());

        session()->flash('success', __('error.added_successfully'));
        return redirect()->route('dashboard.settings.index');
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
    public function edit(Setting $setting)
    {
        $title = trans('admin.create_setting');
        return view('dashboard.settings.edit', compact('title','setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'key'=>'string|required',
            'value'=>'string|required',

        ]);
      $setting->update(request()->all());

        session()->flash('success', __('error.updated_successfully'));
        return redirect()->route('dashboard.settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();
        session()->flash('success', __('error.deleted_successfully'));
        return redirect()->route('dashboard.settings.index');

    }
}
