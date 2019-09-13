<?php

namespace App\Http\Controllers\Dashboard;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }


    /****
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getLoginPage()
    {
        return view('auth.login');
    }


    /****
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = request(['email', 'password']);


        $remember = $request->has('remember') ? true : false;

        if (auth()->attempt($credentials, $remember)) {
            if (auth()->user()->hasRole(['super_admin', 'admin']))
                return redirect('dashboard');

            auth()->logout();

        }//////////end if statement

        return back()->withErrors(['message' => trans('auth.failed')]);

    }///////////// end function


}
