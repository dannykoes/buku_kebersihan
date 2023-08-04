<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Master\PembagiantugasModel;
use App\Models\Master\Tugas;
use App\Models\Master\Kantor;
use App\Models\Master\Ruangan;
use App\Models\Master\Lantai;
use App\Models\ToDoModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Helpers\GlobalHelper;
use App\Models\Master\ClientModel;

class TodoApiController extends Controller
{
    function getTodo(Request $r)
    {
        $todo = [];
        $date['n'] = Carbon::now()->format('Y-m-d');
        $date['sw'] = Carbon::now()->startOfWeek()->format('Y-m-d');
        $date['ew'] = Carbon::now()->endOfWeek()->format('Y-m-d');
        $date['sm'] = Carbon::now()->startOfMonth()->format('Y-m-d');
        $date['em'] = Carbon::now()->endOfMonth()->format('Y-m-d');
        $tugas = PembagiantugasModel::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();
        $tugaslist = Tugas::get();
        $ruang = Lantai::select(
            'lantais.id as ruang_id',
            'lantais.lantai as ruang_nama',
            'ruangans.id as lantai_id',
            'ruangans.ruangan as lantai_nama',
            'kantors.id as kantor_id',
            'kantors.nama as kantor_nama'
        )->join('ruangans', 'ruangans.id', '=', 'lantais.ruangan_id')->join('kantors', 'kantors.id', '=', 'lantais.kantor_id')->get();
        $todonow = ToDoModel::where('user_id', Auth::user()->id)->where('type', 1)->whereDate('tanggal', $date['n'])->orderBy('created_at', 'desc')->first();
        $todomin = ToDoModel::where('user_id', Auth::user()->id)->where('type', 2)->whereDate('tanggal', '>=', $date['sw'])->whereDate('tanggal', '>=', $date['ew'])->orderBy('created_at', 'desc')->first();
        $todomon = ToDoModel::where('user_id', Auth::user()->id)->where('type', 3)->whereDate('tanggal', '>=', $date['sm'])->whereDate('tanggal', '>=', $date['em'])->orderBy('created_at', 'desc')->first();
        $exist = false;
        if ($tugas) {
            $hararr = json_decode($tugas->tugas_harian);
            $minarr = json_decode($tugas->tugas_mingguan);
            $bularr = json_decode($tugas->tugas_bulanan);

            $kantorarr = [];
            $lantaiarr = [];
            $ruangarr = [];
            $todoarr = [];
            foreach ($tugaslist as $t) {
                if (in_array($t->id, $hararr)) {
                    $todoarr[] = $t;
                    foreach ($ruang as $k => $v) {
                        if ($t->ruangan_id == $v->ruang_id) {
                            if (!in_array([
                                'id' => $v->kantor_id,
                                'nama' => $v->kantor_nama,
                            ], $kantorarr)) {
                                $kantorarr[] = [
                                    'id' => $v->kantor_id,
                                    'nama' => $v->kantor_nama,
                                ];
                            }
                            if (!array_key_exists($v->kantor_nama, $lantaiarr)) {
                                $lantaiarr[$v->kantor_id . $v->kantor_nama] = [];
                            }
                            if (!in_array($v->lantai_nama, $lantaiarr[$v->kantor_id . $v->kantor_nama])) {
                                $lantaiarr[$v->kantor_id . $v->kantor_nama][] = [
                                    'id' => $v->lantai_id,
                                    'nama' => $v->lantai_nama,
                                ];
                            }
                            if (!array_key_exists($v->lantai_nama, $ruangarr)) {
                                $ruangarr[$v->lantai_id . $v->lantai_nama] = [];
                            }
                            if (!in_array($v->ruang_nama, $ruangarr[$v->lantai_id . $v->lantai_nama])) {
                                $ruangarr[$v->lantai_id . $v->lantai_nama][] = [
                                    'id' => $v->ruang_id,
                                    'nama' => $v->ruang_nama,
                                ];
                            }
                        }
                    }
                }
            }
            $todo['now'] = [
                'kantor' => $kantorarr,
                'lantai' => $lantaiarr,
                'ruang' => $ruangarr,
                'todo' => $todoarr,
            ];

            $kantorarr = [];
            $lantaiarr = [];
            $ruangarr = [];
            $todoarr = [];
            foreach ($tugaslist as $t) {
                if (in_array($t->id, $minarr)) {
                    $todoarr[] = $t;
                    foreach ($ruang as $k => $v) {
                        if ($t->ruangan_id == $v->ruang_id) {
                            if (!in_array([
                                'id' => $v->kantor_id,
                                'nama' => $v->kantor_nama,
                            ], $kantorarr)) {
                                $kantorarr[] = [
                                    'id' => $v->kantor_id,
                                    'nama' => $v->kantor_nama,
                                ];
                            }
                            if (!array_key_exists($v->kantor_nama, $lantaiarr)) {
                                $lantaiarr[$v->kantor_id . $v->kantor_nama] = [];
                            }
                            if (!in_array($v->lantai_nama, $lantaiarr[$v->kantor_id . $v->kantor_nama])) {
                                $lantaiarr[$v->kantor_id . $v->kantor_nama][] = [
                                    'id' => $v->lantai_id,
                                    'nama' => $v->lantai_nama,
                                ];
                            }
                            if (!array_key_exists($v->lantai_nama, $ruangarr)) {
                                $ruangarr[$v->lantai_id . $v->lantai_nama] = [];
                            }
                            if (!in_array($v->ruang_nama, $ruangarr[$v->lantai_id . $v->lantai_nama])) {
                                $ruangarr[$v->lantai_id . $v->lantai_nama][] = [
                                    'id' => $v->ruang_id,
                                    'nama' => $v->ruang_nama,
                                ];
                            }
                        }
                    }
                }
            }
            $todo['min'] = [
                'kantor' => $kantorarr,
                'lantai' => $lantaiarr,
                'ruang' => $ruangarr,
                'todo' => $todoarr,
            ];

            $kantorarr = [];
            $lantaiarr = [];
            $ruangarr = [];
            $todoarr = [];
            foreach ($tugaslist as $t) {
                if (in_array($t->id, $bularr)) {
                    $todoarr[] = $t;
                    foreach ($ruang as $k => $v) {
                        if ($t->ruangan_id == $v->ruang_id) {
                            if (!in_array([
                                'id' => $v->kantor_id,
                                'nama' => $v->kantor_nama,
                            ], $kantorarr)) {
                                $kantorarr[] = [
                                    'id' => $v->kantor_id,
                                    'nama' => $v->kantor_nama,
                                ];
                            }
                            if (!array_key_exists($v->kantor_nama, $lantaiarr)) {
                                $lantaiarr[$v->kantor_id . $v->kantor_nama] = [];
                            }
                            if (!in_array($v->lantai_nama, $lantaiarr[$v->kantor_id . $v->kantor_nama])) {
                                $lantaiarr[$v->kantor_id . $v->kantor_nama][] = [
                                    'id' => $v->lantai_id,
                                    'nama' => $v->lantai_nama,
                                ];
                            }
                            if (!array_key_exists($v->lantai_nama, $ruangarr)) {
                                $ruangarr[$v->lantai_id . $v->lantai_nama] = [];
                            }
                            if (!in_array($v->ruang_nama, $ruangarr[$v->lantai_id . $v->lantai_nama])) {
                                $ruangarr[$v->lantai_id . $v->lantai_nama][] = [
                                    'id' => $v->ruang_id,
                                    'nama' => $v->ruang_nama,
                                ];
                            }
                        }
                    }
                }
            }
            $todo['mon'] = [
                'kantor' => $kantorarr,
                'lantai' => $lantaiarr,
                'ruang' => $ruangarr,
                'todo' => $todoarr,
            ];

            $exist = true;
        }

        return response()->json([
            'success' => true,
            'exist' => $exist,
            'tugas' => $tugas,
            'todo' => $todo,
            'date' => $date,
        ]);
    }

    function setTodo(Request $r)
    {

        return response()->json([
            'success' => false,
            'r' => $r->all(),
            'message' => 'Berhasil menyimpan data',
        ]);
        $date['n'] = Carbon::now()->format('Y-m-d');
        $date['sw'] = Carbon::now()->startOfWeek()->format('Y-m-d');
        $date['ew'] = Carbon::now()->endOfWeek()->format('Y-m-d');
        $date['sm'] = Carbon::now()->startOfMonth()->format('Y-m-d');
        $date['em'] = Carbon::now()->endOfMonth()->format('Y-m-d');

        $ex = null;

        $type = 0;
        if ($r->durasi == 'Harian') {
            $type = 1;
            $ex = ToDoModel::where('user_id', Auth::user()->id)->where('type', 1)->whereDate('tanggal', $date['n'])->orderBy('created_at', 'desc')->first();
        }
        if ($r->durasi == 'Mingguan') {
            $type = 2;
            $ex = ToDoModel::where('user_id', Auth::user()->id)->where('type', 2)->whereDate('tanggal', '>=', $date['sw'])->whereDate('tanggal', '>=', $date['ew'])->orderBy('created_at', 'desc')->first();
        }
        if ($r->durasi == 'Bulanan') {
            $type = 3;
            $ex = ToDoModel::where('user_id', Auth::user()->id)->where('type', 3)->whereDate('tanggal', '>=', $date['sm'])->whereDate('tanggal', '>=', $date['em'])->orderBy('created_at', 'desc')->first();
        }

        $sebelum = '#';
        $sesudah = '#';

        if (isset($r->sebelum)) {
            if ($r->hasFile('sebelum')) {
                $sebelum = $r->file('sebelum')->store('sebelum/' . Auth::user()->id . '/' . time());
            }
        }

        if (isset($r->sesudah)) {
            if ($r->hasFile('sesudah')) {
                $sesudah = $r->file('sesudah')->store('sesudah/' . Auth::user()->id . '/' . time());
            }
        }

        if ($ex != null) {
            ToDoModel::where('id', $ex->id)->update([
                'type' => $type,
                'ruang_id' => $r->ruang,
                'job_id' => $r->todo,
                'tanggal' => $date['n'],
                'sebelum' => $sebelum,
                'sesudah' => $sesudah,
            ]);
        } else {
            ToDoModel::create([
                'user_id' => Auth::user()->id,
                'type' => $type,
                'ruang_id' => $r->ruang,
                'job_id' => $r->todo,
                'tanggal' => $date['n'],
                'sebelum' => $sebelum,
                'sesudah' => $sesudah,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Berhasil menyimpan data',
        ]);
    }


    public function simpantodo(Request $request)
    {
        $data = [];
        for ($i = 0; $i < count(json_decode($request->datagambar)); $i++) {
            $img = json_decode($request->datagambar)[$i];
            $image = $request->file($img)->getPathname();
            $cdl = GlobalHelper::cloudinarys();
            $clc = ClientModel::where('id', Auth::user()->client_id)->first();
            $cloudinary = $cdl->uploadApi()->upload($image, ['folder' => $clc['perusahaan'] . '/joblist/']);
            $bukti = $cloudinary['secure_url'];
            // // $data[] =  $request->file($img)->getPathname();

            $data[] = [
                'url' => $bukti,
                'public_id' => $cloudinary['public_id']
            ];
        }

        return $data;
    }
}
