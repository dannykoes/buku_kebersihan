<?php

namespace App\Http\Controllers;

use App\Models\Master\Tugas;
use App\Models\TodoNewModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $data['pengguna'] = User::select(
            'users.id',
            // 'kantors.nama',
            // 'ruangans.ruangan',
            // 'lantais.lantai',
        )
            // ->join('tugas', 'tugas.id', 'users.id')
            // ->join('lantais', 'lantais.id', 'tugas.ruangan_id')
            // ->join('ruangans', 'ruangans.id', 'lantais.ruangan_id')
            // ->join('kantors', 'kantors.id', 'tugas.kantor_id')
            ->where('users.role', 3)
            ->pluck('users.id')
            ->toArray();
        $data['job'] = TodoNewModel::whereIn('id_pegawai', $data['pengguna'])->get();

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
}
