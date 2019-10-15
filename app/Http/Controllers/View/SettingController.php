<?php

namespace App\Http\Controllers\View;

use App\File;
use App\Http\Controllers\BaseController;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingController extends BaseController
{

    function index()
    {
        $title = trans('course.setting');
        return view('user.settings',compact('title'));
    }



    public function updateUserInformation(Request $request)
    {
        try {
            $rules = [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . auth()->id()],
                'image' => ['nullable', 'image'],
            ];
            $validate = Validator::make($request->all(), $rules);
            if ($validate->fails()) {
                return response(['status' => false, 'errors' => $validate->messages()], 403);
            } else {

                auth()->user()->update($request->all());
                if ($request->has('image')) {
                    $new_path = $this->uploadImage($request, auth()->user());
                    if (!empty(auth()->user()->image)) {

                        auth()->user()->image()->update(['file_path'=>$new_path]);

                    } else {
                        auth()->user()->image()->save(new File(['file_path' => $new_path]));
                    }
                }


                return response(['status' => true, 'message' => trans('messages.update_user_information_done')]);

            }
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => false, 'message' => $e->getMessage()], 403);

        }

    }
    public function updateUserPassword(Request $request)
    {


        try {
            $rules = [
                'current_password' => ['required'],
                'new_password' => ['required', 'string', 'min:8', 'confirmed', 'different:current_password'],
            ];
            $validate = Validator::make($request->all(), $rules);
            if ($validate->fails()) {
                return response(['status' => false, 'errors' => $validate->messages()], 403);
            } else {
                if (!Hash::check($request['current_password'], auth()->user()->password)) {
                    return response(['status' => false, 'message' => trans('messages.password_not_correct')], 403);

                } else {
                    $user = User::find(auth()->user()->id);
                    $user->password = bcrypt($request['new_password']);
                    $user->save();
                    return response(['status' => true, 'message' => trans('messages.change_password_done')]);


                }


            }
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => false, 'message' => $e->getMessage()], 403);

        }

    }

    /***
     * @param $image
     * @param null $edit
     * @return mixed
     */
    function uploadImage($image, $edit = null)
    {
      /*  if ($edit != null)
            Storage::has($edit->image->file_path) ? Storage::delete($edit->image->file_path) : '';*/
//        dd(2);

        $file = $image->file('image')->store('image/user');
        return $file;

    }


}
