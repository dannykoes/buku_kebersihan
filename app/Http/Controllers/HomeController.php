<?php

namespace App\Http\Controllers;

use App\Models\ALokasiModel;
use App\Models\AObjectModel;
use App\Models\APekerjaanModel;
use App\Models\Master\Tugas;
use App\Models\TodoNewModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['fee'] = [];
        $data['job'] = TodoNewModel::select(
            'todo_new_models.*',
            'users.name',
            // 'kantors.nama',
            // 'ruangans.ruangan',
            // 'lantais.lantai',
        )
            ->join('users', 'users.id', 'todo_new_models.id_pegawai')
            // ->join('lantais', 'lantais.id', 'tugas.ruangan_id')
            // ->join('ruangans', 'ruangans.id', 'lantais.ruangan_id')
            // ->join('kantors', 'kantors.id', 'tugas.kantor_id')
            // ->where('users.role', 7)
            ->get();
        foreach ($data['job'] as $key => $v) {
            $v->objects = [];
            $v->photos = [];
            $v->job = [];
            $v->harian = [];
            if ($v->tugas) {
                $v->job = json_decode($v->tugas);
            }
            foreach ($v->job as $key => $value) {
                # code...
            }
            if ($v->foto) {
                $v->photos = json_decode($v->foto);
            }
        }
        // return $data;
        $data['harian'] = Tugas::select(
            'tugas.*',
            'kantors.nama',
            'ruangans.ruangan',
            'lantais.lantai',
            'users.name',
        )
            ->join('lantais', 'lantais.id', 'tugas.ruangan_id')
            ->join('ruangans', 'ruangans.id', 'lantais.ruangan_id')
            ->join('kantors', 'kantors.id', 'tugas.kantor_id')
            ->join('users', 'users.id', 'tugas.id_pengguna')
            ->where('tugas.kategori', 1)
            ->get();
        $data['mingguan'] = Tugas::select(
            'tugas.*',
            'kantors.nama',
            'ruangans.ruangan',
            'lantais.lantai',
            'users.name',
        )
            ->join('lantais', 'lantais.id', 'tugas.ruangan_id')
            ->join('ruangans', 'ruangans.id', 'lantais.ruangan_id')
            ->join('kantors', 'kantors.id', 'tugas.kantor_id')
            ->join('users', 'users.id', 'tugas.id_pengguna')
            ->where('tugas.kategori', 2)
            ->get();
        $data['bulanan'] = Tugas::select(
            'tugas.*',
            'kantors.nama',
            'ruangans.ruangan',
            'lantais.lantai',
            'users.name',
        )
            ->join('lantais', 'lantais.id', 'tugas.ruangan_id')
            ->join('ruangans', 'ruangans.id', 'lantais.ruangan_id')
            ->join('kantors', 'kantors.id', 'tugas.kantor_id')
            ->join('users', 'users.id', 'tugas.id_pengguna')
            ->where('tugas.kategori', 3)
            ->get();
        $data['peta'] = ALokasiModel::select(
            'a_lokasi_models.*',
            'a_kantor_models.nama',
        )
            ->join('a_kantor_models', 'a_kantor_models.id', 'a_lokasi_models.kantor_id')
            ->get();
        // return $data;
        if (Auth::user()->role == 0 && Auth::user()->role == null) {
            return view('backend.beranda', $data);
        } elseif (Auth::user()->role == 1) {
            return view('backend.dashboard.spvdashboard');
        } elseif (Auth::user()->role == 2) {
            return view('backend.dashboard.clcdashboard');
        } else {
            return view('backend.dashboard.petugasdashboard');
        }
    }
    function changeapproval(Request $request)
    {
        if ($request->approval) {
            $t = TodoNewModel::where('id', $request->tugasid)->update([
                'status' => $request->status
            ]);
            if ($t) {
                return Redirect::back()->with('info', 'Berhasil Tersimpan');
            }
            return Redirect::back()->with('info', 'Gagal Tersimpan');
        }
    }
    function approval(Request $request)
    {
        // return $request->all();

        $js =  json_decode($request->detaildata);
        foreach ($js->Harian as $key => $value) {
            $value->komentar = $request->komentarharian[$key] ? $request->komentarharian[$key] : '';
            $value->nilai = $request->nilaiharian[$key] ? $request->nilaiharian[$key] : '';
        }
        foreach ($js->Mingguan as $key => $value) {
            $value->komentar = $request->komentarmingguan[$key] ? $request->komentarmingguan[$key] : '';
            $value->nilai = $request->nilaimingguan[$key] ? $request->nilaimingguan[$key] : '';
        }
        foreach ($js->Bulanan as $key => $value) {
            $value->komentar = $request->komentarbulanan[$key] ? $request->komentarbulanan[$key] : '';
            $value->nilai = $request->nilaibulanan[$key] ? $request->nilaibulanan[$key] : '';
        }
        // return $js;
        $t = TodoNewModel::where('id', $request->tugasid)->update([
            'tugas' => json_encode($js)
        ]);
        if ($t) {
            return Redirect::back()->with('Berhasil Tersimpan');
        }
        return Redirect::back()->with('Gagal Tersimpan');
    }
}
