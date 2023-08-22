<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AJobModel;
use App\Models\AObjectModel;
use App\Models\APekerjaanModel;
use App\Models\Master\Tugas;
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

        $jb = AJobModel::where('user_id', Auth::user()->id)->first();

        $datacheck = [];
        $fixdata = [];
        $dat = AObjectModel::leftJoin('a_gedung_models', 'a_gedung_models.id', '=', 'a_object_models.gedung_id')
            ->leftJoin('a_lantai_models', 'a_lantai_models.id', '=', 'a_object_models.lantai_id')
            ->leftJoin('a_ruangan_models', 'a_ruangan_models.id', '=', 'a_object_models.ruangan_id')
            ->whereIn('a_object_models.gedung_id', json_decode($jb['objek_id']))
            ->get(['a_gedung_models.gedung', 'a_lantai_models.lantai', 'a_ruangan_models.ruangan', 'a_object_models.*']);
        foreach ($dat as $key => $value) {
            $datacheck = APekerjaanModel::whereIn('id', json_decode($value->object))->get();
            if ($value->kategori == 1) {
                $value->namakategori = 'Harian';
            }
            if ($value->kategori == 2) {
                $value->namakategori = 'Mingguan';
            }
            if ($value->kategori == 3) {
                $value->namakategori = 'Bulanan';
            }

            foreach ($datacheck as $keys => $values) {
                $fixdata[] = [
                    'object' => $values->nama,
                    'gedung' => $value->gedung,
                    'is_check' => false,
                    'idmasterjob' => $values->id,
                    'idjobobject' => $value->id,
                    'lantai' => $value->lantai,
                    'ruangan' => $value->ruangan,
                    'namakategori' => $value->namakategori
                ];
            }
        }
        return response()->json([
            'success' => true,
            'user' => Auth::user(),
            'datajob' => $fixdata
        ]);
    }
    public function doLogin(Request $r)
    {
        // return response()->json([
        //     'dat' => $r->all()
        // ]);
        if (Auth::attempt(['name' => request('email'), 'password' => request('password')])) {
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
            $jb = AJobModel::where('user_id', Auth::user()->id)->first();
            $datacheck = [];
            $fixdata = [];
            $dat = AObjectModel::leftJoin('a_gedung_models', 'a_gedung_models.id', '=', 'a_object_models.gedung_id')
                ->leftJoin('a_lantai_models', 'a_lantai_models.id', '=', 'a_object_models.lantai_id')
                ->leftJoin('a_ruangan_models', 'a_ruangan_models.id', '=', 'a_object_models.ruangan_id')
                ->whereIn('a_object_models.gedung_id', json_decode($jb['objek_id']))
                ->get(['a_gedung_models.gedung', 'a_lantai_models.lantai', 'a_ruangan_models.ruangan', 'a_object_models.*']);
            foreach ($dat as $key => $value) {
                $datacheck = APekerjaanModel::whereIn('id', json_decode($value->object))->get();
                if ($value->kategori == 1) {
                    $value->namakategori = 'Harian';
                }
                if ($value->kategori == 2) {
                    $value->namakategori = 'Mingguan';
                }
                if ($value->kategori == 3) {
                    $value->namakategori = 'Bulanan';
                }
                foreach ($datacheck as $keys => $values) {
                    $fixdata[] = [
                        'object' => $values->nama,
                        'gedung' => $value->gedung,
                        'is_check' => false,
                        'idmasterjob' => $values->id,
                        'idjobobject' => $value->id,
                        'lantai' => $value->lantai,
                        'ruangan' => $value->ruangan,
                        'namakategori' => $value->namakategori
                    ];
                }
            }

            return response()->json([
                'success' => true,
                'token' => $success,
                'user' => $user,
                'datajob' => $fixdata
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Id pegawai or Password',
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
