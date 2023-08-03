<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PenggunaController extends Controller
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
        Session::put('tab', 5);
        $validator = Validator::make($request->all(), [
            'namapengguna' => 'required',
            'idpegawaipengguna' => 'required',
            'rolepengguna' => 'required',
            'client' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all())->with('error', 'Harap Cek Data Kembali');
        }
        if (!$request->passwordpengguna && !$request->idpengguna) {
            return Redirect::back()->withErrors($validator)->withInput($request->all())->with('error', 'Harap Cek Data Kembali');
        }
        $input = [
            'name' => $request->namapengguna,
            'email' => fake()->unique()->safeEmail(),
            'role' => $request->rolepengguna,
            'id_pegawai' => $request->idpegawaipengguna,
            'client_id' => $request->client
        ];
        if ($request->passwordpengguna) {
            $input['password'] = Hash::make($request->passwordpengguna);
        };
        $k = User::updateOrCreate([
            'id' => $request->idpengguna
        ], $input);
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
        Session::put('tab', 5);
        $k = User::where('id', $id)->delete();
        if ($k) {
            return Redirect::back()->with('info', 'Data Terhapus');
        }
        return Redirect::back()->with('error', 'Data Gagal Terhapus');
    }
}
