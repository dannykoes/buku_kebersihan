<?php

namespace App\Http\Controllers;

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
            ->where('users.role', 3)
            ->get();
        foreach ($data['job'] as $key => $v) {
            $v->job = [];
            $v->photos = [];
            if ($v->tugas) {
                $v->job = json_decode($v->tugas);
            }
            if ($v->foto) {
                $v->photos = json_decode($v->foto);
            }
        }

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
    function approval(Request $request)
    {
        return $request->all();
        $js =  json_decode($request->detaildata);
        foreach ($js as $key => $value) {
            $value->komentar = $request->detailkomentar[$key] ? $request->detailkomentar[$key] : '';
            $value->nilai = $request->detailnilai[$key] ? $request->detailnilai[$key] : '';
        }
        return $js;
    }
}
