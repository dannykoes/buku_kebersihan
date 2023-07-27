<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\ClientModel;
use App\Models\Master\Kantor;
use App\Models\Master\Lantai;
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
        $data['pengguna'] = User::get();
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
            'ruangans.ruangan as namaruangan',
        )
            ->leftJoin('kantors', 'kantors.id', 'tugas.kantor_id')
            ->leftJoin('ruangans', 'ruangans.id', 'tugas.ruangan_id')
            ->get();
        $tagsharian = Tugas::select('nama')->distinct('nama')->pluck('nama')->toArray();
        $tagsmingguan = Tugas::select('tugas_mingguan')->distinct('tugas_mingguan')->pluck('tugas_mingguan')->toArray();
        $tagsbulanan = Tugas::select('tugas_bulanan')->distinct('tugas_bulanan')->pluck('tugas_bulanan')->toArray();
        $data['tagtugas'] = [];
        $data['tagtugasminggu'] = [];
        $data['tagtugasbulanan'] = [];

        foreach ($tagsharian as $key => $value) {
            if ($value) {
                $js = json_decode($value);
                if ($js) {
                    foreach ($js as $key => $v) {
                        if (!in_array($v, $data['tagtugas'])) {
                            array_push($data['tagtugas'], $v);
                        }
                    }
                }
            }
        }

        foreach ($tagsmingguan as $key => $value) {
            if ($value) {
                $js = json_decode($value);
                if ($js) {
                    foreach ($js as $key => $v) {
                        if (!in_array($v, $data['tagtugasminggu'])) {
                            array_push($data['tagtugasminggu'], $v);
                        }
                    }
                }
            }
        }

        foreach ($tagsbulanan as $key => $value) {
            if ($value) {
                $js = json_decode($value);
                if ($js) {
                    foreach ($js as $key => $v) {
                        if (!in_array($v, $data['tagtugasbulanan'])) {
                            array_push($data['tagtugasbulanan'], $v);
                        }
                    }
                }
            }
        }
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
