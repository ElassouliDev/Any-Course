<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\UserDataTable;
use App\Http\Controllers\BaseController;
use App\Http\Requests\UserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//      public function __construct()
//    {
//
//        //role profile
//        $this->middleware(['permission:update_profile'])->only('update_profile');
//        $this->middleware(['permission:read_profile'])->only('profile');
//
//        // role user create read update delete
//        $this->middleware(['permission:read_users'])->only('index');
//        $this->middleware(['permission:create_users'])->only('create');
//        $this->middleware(['permission:update_users'])->only('edit');
//        $this->middleware(['permission:delete_users'])->only('destroy');
//
//    }//end of constructor
    public function index(UserDataTable $user)
    {
        $title = trans('admin.users');
        return $user->render('dashboard.users.index', ['title' => trans('admin.users')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $title = trans('admin.create_user');
        return view('dashboard.users.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\UserRequest  $userRequest
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $userRequest)
    {
        $request_data= $userRequest->except(['password', 'password_confirmation', 'permissions']);
        $request_data['password'] = bcrypt($userRequest->password);
        $user = User::create($request_data);

        $user->attachRole($userRequest->permissions);

        session()->flash('success', __('error.added_successfully'));
        return redirect()->route('dashboard.users.index',['users'=>$userRequest->permissions]);

    }

    /**
     * Display the specified resource.
     *
     *
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.

     */

    public function edit(User $user)
    {
        $title = trans('admin.edit');
        return view('dashboard.users.edit', compact('user','title'));

    }

    /**

     */
    public function update(UserRequest $request,  User $user)
    {


        $user->update($request->all());
        $user->detachRole();
        $user->attachRole($request->permissions);
        session()->flash('success', __('error.updated_successfully'));
        return redirect()->route('dashboard.users.index',['users'=>$request->permissions]);
    }


    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('success', __('error.deleted_successfully'));
        return back();
    }

    public function profile()
    {
        $title = trans('admin.profile');
        return view('dashboard.users.profile',  compact('title'));

    }
    public function update_profile(Request $request ,User $user)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore(auth()->user()->id),],
            'permissions' => 'required|min:1'
        ]);

        auth()->user()->update($request->all());
        session()->flash('success', __('error.updated_successfully'));
        return redirect('dashboard');

    }
}
