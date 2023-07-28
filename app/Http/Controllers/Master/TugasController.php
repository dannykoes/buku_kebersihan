<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TugasController extends Controller
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
        Session::put('tab', 4);
        $validator = Validator::make($request->all(), [
            'kantortugas' => 'required',
            'ruangantugas' => 'required',
            'nama_tugas' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all())->with('error', 'Harap Cek Data Kembali');
        }


        $k = Tugas::updateOrCreate([
            'id' => $request->idtugas
        ], [
            'kantor_id' => $request->kantortugas,
            'ruangan_id' => $request->ruangantugas,
            'nama_tugas' => $request->nama_tugas
            // 'nama' => json_encode($request->namatugas),
            // 'tugas_mingguan' => json_encode($request->tugasmingguan),
            // 'tugas_bulanan' => json_encode($request->tugasbulanan),
        ]);
        if ($k) {
            return Redirect::back()->with('info', 'Tersimpan');
        }
        return Redirect::back()->withErrors($validator)->withInput($request->all())->with('error', 'Harap Cek Data Kembali');
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
        Session::put('tab', 4);
        $k = Tugas::where('id', $id)->delete();
        if ($k) {
            return Redirect::back()->with('info', 'Data Terhapus');
        }
        return Redirect::back()->with('error', 'Data Gagal Terhapus');
    }
}
