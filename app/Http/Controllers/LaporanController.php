<?php

namespace App\Http\Controllers;

use App\Models\AGedungModel;
use App\Models\AKantorModel;
use App\Models\ALantaiModel;
use App\Models\ARuanganModel;
use App\Models\Master\Kantor;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Response Ajax
        if ($request->ajax()) {
            // return $request->all();
            $data['ruangan'] = ARuanganModel::select()
                ->where('kantor_id', $request->kantor)
                ->where('gedung_id', $request->gedung)
                ->where('lantai_id', $request->lantai)
                ->get();
            $chartcate = [];
            $chartdata = [];
            foreach ($data['ruangan'] as $key => $v) {
                array_push($chartcate, $v->ruangan);
                array_push($chartdata, $key);
            }
            $data['chartcate'] = json_encode($chartcate);
            $data['chartdata'] = json_encode($chartdata);
            return $data;
        }



        $data = [];
        $data['kantor'] = AKantorModel::get();
        $data['gedung'] = AGedungModel::get();
        $data['lantai'] = ALantaiModel::get();
        $data['ruangan'] = ARuanganModel::get();
        $data['harian'] = [];
        $data['mingguan'] = [];
        $data['bulanan'] = [];
        $chartcate = [];
        $chartdata = [];
        foreach ($data['ruangan'] as $key => $v) {
            array_push($chartcate, $v->ruangan);
            array_push($chartdata, $key);
        }
        $data['chartcate'] = json_encode($chartcate);
        $data['chartdata'] = json_encode($chartdata);
        // return $data;
        return view('backend.laporan', $data);
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
