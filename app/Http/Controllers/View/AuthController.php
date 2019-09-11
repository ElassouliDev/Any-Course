<?php

namespace App\Http\Controllers\View;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{


    function getLoginPage()
    {
        $action = 'login';
        return view('auth.user.login', compact('action'));
    }

    function getRegisterPage()
    {
        $action = 'register';
        return view('auth.user.login', compact('action'));
    }


    public function login(Request $request)
    {

        try {

            $rules = [
                'email' => 'required|email',
                'password' => 'required',
            ];

            $validate = Validator::make($request->all(), $rules);

            $credentials = request(['email', 'password']);

            if ($validate->fails()) {
                return response()->json(['status' => false, 'message' => $validate->messages()], 403);
            } else {
                $remember = $request->has('remember') ? true : false;

                if (auth()->attempt($credentials, $remember)) {
                    $url = (auth()->user()->hasRole('lecture')) ? route('course_lecture.index') : url('/');
                    return response()->json(['status' => true, 'url' => $url], 200);
                } else {
                    return response()->json(['status' => false, 'message' => trans('messages.loginFailed')], 401);

                }
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 403);

        }

    }


    protected function register(Request $request)
    {
        try {
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'skin_type' => ['required'],
                'hair_type' => ['required'],
                'undertone' => ['required'],
                'is_hair_dyed' => ['required', 'boolean'],
                'age_group' => ['required'],
                'hair_color' => ['required', 'string'],
                'country' => ['required', 'string'],
                'image' => ['nullable', 'string'],
            ];
            $validate = Validator::make($request->all(), $rules);
            if ($validate->fails()) {
                return response()->json(['status' => false, 'message' => $validate->messages()], 403, [], JSON_UNESCAPED_UNICODE);
            } else {

                $data = [
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password'])
                ];
                if ($request->has('image')) {
                    $arr = explode(",", $request->image);
                    $ext = $arr[0];
                    $imgContent = base64_decode($arr[1]);
                    $typeImg = substr($ext, strpos($ext, '/') + 1, strpos($ext, ';') - strpos($ext, '/') - 1);
                    $location = "image/user/user_" . time() . ".$typeImg";
                    \File::put(storage_path('app/public') . '/' . $location, $imgContent);
                    $data['image'] = $location;
                }
                $user = User::create($data);

                $user->attachRole('user');
                $skin_type_id = Skin_Type::where('name_ar', $request['skin_type'])
                    ->orWhere('name_en', $request['skin_type'])->first()->id;

                $hair_type_id = Hear_Type::where('name_ar', $request['hair_type'])
                    ->orWhere('name_en', $request['hair_type'])->first()->id;

                $undertone_id = Undertone::where('name_ar', $request['undertone'])
                    ->orWhere('name_en', $request['undertone'])->first()->id;
                UserDetails::create([
                    'user_id' => $user->id,
                    'skin_type_id' => $skin_type_id,
                    'hear_type_id' => $hair_type_id,
                    'hair_color' => $request['hair_color'],
                    'age_group' => $request['age_group'],
                    'is_hair_dyed' => $request['is_hair_dyed'],
                    'undertone_id' => $undertone_id,
                    'country' => $request['country'],

                ]);
                $credentials = request(['email', 'password']);
                $token = auth()->guard('api')->attempt($credentials);
                return $this->respondWithToken($token);

            }
        } catch (\Exception $e) {
            DB::rollback();
            return response(['status' => false, 'message' => $e->getMessage()], 403);

        }


    }


}
