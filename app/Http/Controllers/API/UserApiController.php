<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserApiController extends Controller
{
    public function doAuthCheck(Request $r)
    {
        // if (isset($r->fbtoken) && $r->fbtoken != null) {
        // 	DB::table('users_firebase')->UpdateOrInsert([
        // 		'token'=>$r->fbtoken,
        // 		'user_id'=>Auth::user()->id,
        // 	],[
        // 		'token'=>$r->fbtoken,
        // 		'user_id'=>Auth::user()->id,
        // 		'created_at'=>date('Y-m-d H:i:s'),
        // 	]);
        // }
        return response()->json([
            'success' => true,
            'user' => Auth::user(),
        ]);
    }
    public function doLogin(Request $r)
    {
        // return response()->json([
        //     'dat' => $r->all()
        // ]);
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            // $emp = Pegawai::where('user_id',$user->id)->exists();

            // if (!$emp) {
            // 	return response()->json([
            // 		'success' => false,
            // 		'message' => 'No Employee Associated With This Account',
            // 	], 401);
            // }

            $success['token'] = Auth::user()->createToken('ptgunadigraha')->plainTextToken;

            // if (isset($r->fbtoken) && $r->fbtoken != null) {
            // 	DB::table('users_firebase')->UpdateOrInsert([
            // 		'token'=>$r->fbtoken,
            // 		'user_id'=>Auth::user()->id,
            // 	],[
            // 		'token'=>$r->fbtoken,
            // 		'user_id'=>Auth::user()->id,
            // 		'created_at'=>date('Y-m-d H:i:s'),
            // 	]);
            // }

            return response()->json([
                'success' => true,
                'token' => $success,
                'user' => $user,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }
    }

    public function doLogout(Request $r)
    {
        if (Auth::user()) {
            $user = Auth::user()->tokens();
            $tkId = Str::before(request()->bearerToken(), '|');
            $user->where('id', $tkId)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Logout Successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Unable to Logout'
            ], 401);
        }
    }
}
