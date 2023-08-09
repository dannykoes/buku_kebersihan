<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\AGedungModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AgedungController extends Controller
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
        // return $request->all();
        session()->put('tab', 1);
        $validator = Validator::make($request->all(), [
            'gedungkantorid' => 'required',
            'gedungnama' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all())->with('error', 'Harap Cek Data Kembali');
        }

        $k =  AGedungModel::updateOrCreate([
            'id' => $request->gedungid
        ], [
            'kantor_id' => $request->gedungkantorid,
            'gedung' => $request->gedungnama,
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
            return AGedungModel::where('kantor_id', $request->kantor)->get();
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
        session()->put('tab', 1);
        $k = AGedungModel::where('id', $id)->delete();
        if ($k) {
            return Redirect::back()->with('info', 'Berhasil Hapus');
        }
        return Redirect::back()->with('error', 'Gagal Hapus');
    }
}
