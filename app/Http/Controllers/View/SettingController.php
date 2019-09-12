<?php

namespace App\Http\Controllers\View;

use App\File;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{

    function index()
    {
        return view('user.settings');
    }

    /*function updateInfo($course_id)
    {
        Auth::user()->student_course()->toggle($course_id);
        return back();

    }*/

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

    function complete_watch_lesson(Request $request)
    {
        Auth::user()->student_watch_lesson()->syncWithoutDetaching([$request->lesson_id => ['is_completed' => true]]);

        return response(['status' => true]);

    }
}
