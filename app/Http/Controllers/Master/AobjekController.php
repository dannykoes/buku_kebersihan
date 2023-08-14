<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\AObjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AobjekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // return $request->harian[0];
        session()->put('tab', 4);
        $kategori = 0;
        $validator = Validator::make($request->all(), [
            'objekkantorid' => 'required',
            'objekgedungid' => 'required',
            'objeklantaiid' => 'required',
            'objeknama' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all())->with('error', 'Harap Cek Data Kembali');
        }

        if ($request->harian) {
            $kategori = 1;
        }
        if ($request->mingguan) {
            $kategori = 2;
        }
        if ($request->bulanan) {
            $kategori = 3;
        }
        if (count($request->harian) <= 0) {
            return Redirect::back()->withInput($request->all())->with('error', 'Kategori Belum Dipilih');
        }
        $k =  AObjectModel::updateOrCreate([
            'id' => $request->objekid
        ], [
            'kantor_id' => $request->objekkantorid,
            'gedung_id' => $request->objekgedungid,
            'lantai_id' => $request->objeklantaiid,
            'ruangan_id' => $request->objekruanganid,
            'kategori' => $request->harian[0],
            'object' => $request->objeknama,
        ]);
        if ($k) {
            return Redirect::back()->with('info', 'Berhasil Simpan');
        }
        return Redirect::back()->with('info', 'Gagal Simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        if ($id == 'getbykantor') {
            return AObjectModel::select(
                'a_object_models.*',
                'a_kantor_models.nama',
            )
                ->join('a_kantor_models', 'a_kantor_models.id', 'a_object_models.kantor_id')
                ->where('a_object_models.kantor_id', $request->kantor)
                ->get();
        }
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
        session()->put('tab', 4);
        $k = AObjectModel::where('id', $id)->delete();
        if ($k) {
            return Redirect::back()->with('info', 'Berhasil Hapus');
        }
        return Redirect::back()->with('error', 'Gagal Hapus');
    }
}
