<?php

namespace App\Http\Controllers\Dashboard;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
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
        $users = User::whereRoleIs('admin')->where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {

                return $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');

            });

        })->latest()->paginate(5);
        $title = trans('admin.users');
        return view('dashboard.users.index', compact('title','users'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'permissions' => 'required|min:1'
        ]);

        $request_data = $request->except(['password', 'password_confirmation', 'permissions', 'image']);
        $request_data['password'] = bcrypt($request->password);


        $user = User::create($request_data);
        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);

        session()->flash('success', __('error.added_successfully'));
        return redirect()->route('dashboard.users.index');
    }

    /**
     * Display the specified resource.
     *
\
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
    public function update(Request $request,  User $user)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user->id),],
            'permissions' => 'required|min:1'
        ]);

        $user->update($request->all());
        $user->syncPermissions($request->permissions);
        session()->flash('success', __('error.updated_successfully'));
        return redirect()->route('dashboard.users.index');
    }


    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('success', __('error.deleted_successfully'));
        return redirect()->route('dashboard.users.index');
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
        auth()->user()->syncPermissions($request->permissions);
        session()->flash('success', __('error.updated_successfully'));
        return redirect('dashboard');

    }
}
