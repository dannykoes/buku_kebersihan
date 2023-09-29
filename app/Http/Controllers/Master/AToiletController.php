<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\AToiletModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AToiletController extends Controller
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
        session()->put('tab', 9);
        $validator = Validator::make($request->all(), [
            'toiletkantorid' => 'required',
            'toiletgedungid' => 'required',
            'toiletlantaiid' => 'required',
            'toiletnama' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all())->with('error', 'Harap Cek Data Kembali');
        }
        $k =  AToiletModel::updateOrCreate([
            'id' => $request->toiletid
        ], [
            'kantor_id' => $request->toiletkantorid,
            'gedung_id' => $request->toiletgedungid,
            'lantai_id' => $request->toiletlantaiid,
            'toilet' => $request->toiletnama,
        ]);
        if ($k) {
            return Redirect::back()->with('info', 'Berhasil Simpan');
        }
        return Redirect::back()->with('info', 'Gagal Simpan');
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
        session()->put('tab', 9);
        $k = AToiletModel::where('id', $id)->delete();
        if ($k) {
            return Redirect::back()->with('info', 'Berhasil Hapus');
        }
        return Redirect::back()->with('error', 'Gagal Hapus');
    }
}
