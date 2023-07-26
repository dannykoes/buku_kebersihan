<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Kantor;
use App\Models\Master\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RuanganController extends Controller
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
        Session::put('tab', 2);
        $validator = Validator::make($request->all(), [
            'namaruangan' => 'required',
            'kantorruangan' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all())->with('error', 'Harap Cek Data Kembali');
        }
        $k = Ruangan::updateOrCreate([
            'id' => $request->idruangan
        ], [
            'ruangan' => $request->namaruangan,
            'kantor_id' => $request->kantorruangan,
        ]);
        if ($k) {
            return Redirect::back()->with('info', 'Tersimpan');
        }
        return Redirect::back()->withErrors($validator)->withInput($request->all())->with('error', 'Harap Cek Data Kembali');
    }

    public function getbykantor($kantor)
    {
        return Ruangan::where('kantor_id', $kantor)->get();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $req)
    {
        if ($id == 'getbykantor') {
            return $this->getbykantor($req->kantor);
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
        Session::put('tab', 2);
        $k = Ruangan::where('id', $id)->delete();
        if ($k) {
            return Redirect::back()->with('info', 'Data Terhapus');
        }
        return Redirect::back()->with('error', 'Data Gagal Terhapus');
    }
}
