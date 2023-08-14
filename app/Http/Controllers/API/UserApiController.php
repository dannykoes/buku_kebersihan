<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AJobModel;
use App\Models\AObjectModel;
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
        // $dat = Tugas::leftJoin('ruangans', 'ruangans.id', '=', 'tugas.ruangan_id')
        //     ->leftJoin('kantors', 'kantors.id', '=', 'tugas.kantor_id')
        //     // ->leftJoin('lantais', 'lantais.id', '=', 'tugas.lantai_id')
        //     ->where('id_pengguna', Auth::user()->id)
        //     ->get(['ruangans.ruangan', 'kantors.nama as namakantor', 'tugas.*']);

        // foreach ($dat as $key => $val) {
        //     $val->is_check = false;
        //     if ($val->kategori == 1) {
        //         $val->timejob = 'Harian';
        //     }
        //     if ($val->kategori == 2) {
        //         $val->timejob = 'Mingguan';
        //     }
        //     if ($val->kategori == 3) {
        //         $val->timejob = 'Bulanan';
        //     }
        // }
        $jb = AJobModel::where('user_id', Auth::user()->id)->first();
        $dat = AObjectModel::leftJoin('a_kantor_models', 'a_kantor_models.id', '=', 'a_object_models.kantor_id')
            ->leftJoin('a_gedung_models', 'a_gedung_models.id', '=', 'a_object_models.gedung_id')
            ->leftJoin('a_lantai_models', 'a_lantai_models.id', '=', 'a_object_models.lantai_id')
            ->leftJoin('a_ruangan_models', 'a_ruangan_models.id', '=', 'a_object_models.ruangan_id')
            ->whereIn('a_object_models.gedung_id', json_decode($jb['objek_id']))
            ->get(['a_kantor_models.pic', 'a_gedung_models.gedung', 'a_lantai_models.lantai', 'a_ruangan_models.ruangan', 'a_object_models.*']);

        foreach ($dat as $key => $val) {
            $val->is_check = false;
        }
        return response()->json([
            'success' => true,
            'user' => Auth::user(),
            'datajob' => $dat
        ]);
    }
    public function doLogin(Request $r)
    {
        // return response()->json([
        //     'dat' => $r->all()
        // ]);
        if (Auth::attempt(['id_pegawai' => request('email'), 'password' => request('password')])) {
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

            // $dat = Tugas::leftJoin('ruangans', 'ruangans.id', '=', 'tugas.ruangan_id')
            //     ->leftJoin('kantors', 'kantors.id', '=', 'tugas.kantor_id')
            //     // ->leftJoin('lantais', 'lantais.id', '=', 'tugas.lantai_id')
            //     ->where('id_pengguna', $user['id'])
            //     ->get(['ruangans.ruangan', 'kantors.nama as namakantor', 'tugas.*']);

            // foreach ($dat as $key => $val) {
            //     $val->is_check = false;
            //     if ($val->kategori == 1) {
            //         $val->timejob = 'Harian';
            //     }
            //     if ($val->kategori == 2) {
            //         $val->timejob = 'Mingguan';
            //     }
            //     if ($val->kategori == 3) {
            //         $val->timejob = 'Bulanan';
            //     }
            // }

            $jb = AJobModel::where('user_id', Auth::user()->id)->first();
            $dat = AObjectModel::leftJoin('a_kantor_models', 'a_kantor_models.id', '=', 'a_object_models.kantor_id')
                ->leftJoin('a_gedung_models', 'a_gedung_models.id', '=', 'a_object_models.gedung_id')
                ->leftJoin('a_lantai_models', 'a_lantai_models.id', '=', 'a_object_models.lantai_id')
                ->leftJoin('a_ruangan_models', 'a_ruangan_models.id', '=', 'a_object_models.ruangan_id')
                ->whereIn('a_object_models.gedung_id', json_decode($jb['objek_id']))
                ->get(['a_kantor_models.pic', 'a_gedung_models.gedung', 'a_lantai_models.lantai', 'a_ruangan_models.ruangan', 'a_object_models.*']);

            foreach ($dat as $key => $val) {
                $val->is_check = false;
            }

            // return $dat;
            return response()->json([
                'success' => true,
                'token' => $success,
                'user' => $user,
                'datajob' => $dat
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
