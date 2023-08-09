<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\ALantaiModel;
use App\Models\Master\Lantai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AlantaiController extends Controller
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
        session()->put('tab', 2);
        $validator = Validator::make($request->all(), [
            'lantaikantorid' => 'required',
            'lantaigedungid' => 'required',
            'lantainama' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all())->with('error', 'Harap Cek Data Kembali');
        }
        $k =  ALantaiModel::updateOrCreate([
            'id' => $request->lantaiid
        ], [
            'kantor_id' => $request->lantaikantorid,
            'gedung_id' => $request->lantaigedungid,
            'lantai' => $request->lantainama,
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
        if ($id == 'getbygedung') {
            return ALantaiModel::where('kantor_id', $request->kantor)->where('gedung_id', $request->gedung)->get();
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
        session()->put('tab', 2);
        $k = ALantaiModel::where('id', $id)->delete();
        if ($k) {
            return Redirect::back()->with('info', 'Berhasil Hapus');
        }
        return Redirect::back()->with('error', 'Gagal Hapus');
    }
}
