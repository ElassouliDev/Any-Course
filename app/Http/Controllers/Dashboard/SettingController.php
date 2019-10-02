<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BaseController;
use App\Http\Requests\SettingRequest;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */



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
    public function store(SettingRequest $settingRequest)
    {
       $settingRequest = $settingRequest->all();

        $setting = Setting::create($settingRequest);

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
    public function update(SettingRequest $settingRequest, Setting $setting)
    {
        $settingRequest = $settingRequest->all();
        if(request()->hasFile('icon'))
        {
            \Storage::has($setting->value) ? \Storage::delete($setting->value) : '';
            $icon = request()->file('icon')->store('image') ;
            $settingRequest['value'] = $icon;
        }elseif (request()->hasFile('logo')){
            \Storage::has($setting->value) ? \Storage::delete($setting->value) : '';
            $logo = request()->file('logo')->store('image') ;
            $settingRequest['value'] = $logo;
        }
        $setting->update($settingRequest);

        session()->flash('success', __('error.updated_successfully'));
        return redirect()->route('dashboard.settings.index');
    }


    public function destroy(Setting $setting)
    {
        $setting->delete();
        session()->flash('success', __('error.deleted_successfully'));
        return redirect()->route('dashboard.settings.index');

    }
}
