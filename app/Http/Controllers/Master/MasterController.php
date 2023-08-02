<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\ClientModel;
use App\Models\Master\Kantor;
use App\Models\Master\Lantai;
use App\Models\Master\PembagiantugasModel;
use App\Models\Master\Ruangan;
use App\Models\Master\Tugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $data['client'] = ClientModel::get();
        $data['pengguna'] = User::leftJoin('client', 'client.id', '=', 'users.client_id')->get(['client.perusahaan', 'users.*']);
        $data['kantor'] = Kantor::leftJoin('client', 'client.id', '=', 'kantors.client_id')->get(['client.perusahaan', 'kantors.*']);
        $data['ruangan'] = Ruangan::select(
            'ruangans.*',
            'kantors.nama as namakantor',
        )
            ->join('kantors', 'kantors.id', 'ruangans.kantor_id')
            ->get();
        $data['lantai'] = Lantai::select(
            'lantais.*',
            'kantors.nama as namakantor',
            'ruangans.ruangan as namaruangan',
        )
            ->leftJoin('kantors', 'kantors.id', 'lantais.kantor_id')
            ->leftJoin('ruangans', 'ruangans.id', 'lantais.ruangan_id')
            ->get();
        $data['tugas'] = Tugas::select(
            'tugas.*',
            'kantors.nama as namakantor',
            'lantais.lantai as namaruangan',
        )
            ->leftJoin('kantors', 'kantors.id', 'tugas.kantor_id')
            ->leftJoin('lantais', 'lantais.id', 'tugas.ruangan_id')
            ->get();

        // $usr = User::where('role', 3)->get();

        $data['userptg'] = User::where('role', 3)->get();
        // foreach ($usr as $key => $value) {
        //     $checktgs = PembagiantugasModel::where('user_id', $value->id)->get();
        //     // $value->check = $checktgs->isNotEmpty();
        //     $truefalse = $checktgs->isNotEmpty();
        //     if ($truefalse == false) {
        //         $data['userptg'][] = $value;
        //     }
        // }

        $data['pgntgs'] = PembagiantugasModel::leftJoin('users', 'users.id', '=', 'pembagian_tugas.user_id')
            ->get(['users.name', 'pembagian_tugas.*']);

        foreach ($data['pgntgs'] as $key => $value) {

            $datharian = json_decode($value->tugas_harian);
            $datmingguan = json_decode($value->tugas_mingguan);
            $datbulanan = json_decode($value->tugas_bulanan);

            if ($datharian != null) {
                $value->jobharian = Tugas::leftJoin('ruangans', 'ruangans.id', 'tugas.ruangan_id')
                    ->leftJoin('kantors', 'kantors.id', 'tugas.kantor_id')
                    ->whereIn('tugas.id', $datharian)
                    ->get(['ruangans.ruangan', 'kantors.nama', 'tugas.*']);
            } else {
                $value->jobharian = [];
            }
            if ($datmingguan != null) {
                $value->jobmingguan = Tugas::leftJoin('ruangans', 'ruangans.id', 'tugas.ruangan_id')
                    ->leftJoin('kantors', 'kantors.id', 'tugas.kantor_id')
                    ->whereIn('tugas.id', $datmingguan)
                    ->get(['ruangans.ruangan', 'kantors.nama', 'tugas.*']);
            } else {
                $value->jobmingguan = [];
            }

            if ($datbulanan != null) {
                $value->jobbulanan = Tugas::leftJoin('ruangans', 'ruangans.id', 'tugas.ruangan_id')
                    ->leftJoin('kantors', 'kantors.id', 'tugas.kantor_id')
                    ->whereIn('tugas.id', $datbulanan)
                    ->get(['ruangans.ruangan', 'kantors.nama', 'tugas.*']);
            } else {
                $value->jobbulanan = [];
            }
        }

        // return $data;

        // $tagsharian = Tugas::select('nama')->distinct('nama')->pluck('nama')->toArray();
        // $tagsmingguan = Tugas::select('tugas_mingguan')->distinct('tugas_mingguan')->pluck('tugas_mingguan')->toArray();
        // $tagsbulanan = Tugas::select('tugas_bulanan')->distinct('tugas_bulanan')->pluck('tugas_bulanan')->toArray();
        // $data['tagtugas'] = [];
        // $data['tagtugasminggu'] = [];
        // $data['tagtugasbulanan'] = [];

        // foreach ($tagsharian as $key => $value) {
        //     if ($value) {
        //         $js = json_decode($value);
        //         if ($js) {
        //             foreach ($js as $key => $v) {
        //                 if (!in_array($v, $data['tagtugas'])) {
        //                     array_push($data['tagtugas'], $v);
        //                 }
        //             }
        //         }
        //     }
        // }

        // foreach ($tagsmingguan as $key => $value) {
        //     if ($value) {
        //         $js = json_decode($value);
        //         if ($js) {
        //             foreach ($js as $key => $v) {
        //                 if (!in_array($v, $data['tagtugasminggu'])) {
        //                     array_push($data['tagtugasminggu'], $v);
        //                 }
        //             }
        //         }
        //     }
        // }

        // foreach ($tagsbulanan as $key => $value) {
        //     if ($value) {
        //         $js = json_decode($value);
        //         if ($js) {
        //             foreach ($js as $key => $v) {
        //                 if (!in_array($v, $data['tagtugasbulanan'])) {
        //                     array_push($data['tagtugasbulanan'], $v);
        //                 }
        //             }
        //         }
        //     }
        // }
        // return $data;
        return view('backend.master.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
