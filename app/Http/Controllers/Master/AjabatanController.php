<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\AJabatanModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AjabatanController extends Controller
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
        session()->put('tab', 5);
        session()->put('subtab', 1);
        // return $request->pegawaistatus[0];
        $validator = Validator::make($request->all(), [
            'pegawainip' => 'required',
            'pegawainama' => 'required',
            // 'pegawaitype' => 'required',
            // 'pegawaispv' => 'required',
            // 'pegawaipic' => 'required',
            'pegawaitglbergabung' => 'required',
            'pegawaitglselesai' => 'required',
            'pegawaistatus' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all())->with('error', 'Harap Cek Data Kembali');
        }
        $user = [
            'name' => $request->pegawainama,
            'email' => fake()->unique()->safeEmail(),
        ];

        if (!$request->pegawaiaaa && !$request->pegawaipassword) {
            return Redirect::back()->withErrors($validator)->withInput($request->all())->with('error', 'Password Wajib Isi');
        }
        if ($request->pegawaipassword) {
            $user['password'] = Hash::make($request->pegawaipassword);
        }

        $kantor = [];
        if ($request->pegawaikantor) {
            $kantor = $request->pegawaikantor;
        }

        $p =  AJabatanModel::updateOrCreate([
            'id' => $request->pegawaiid
        ], [
            'nip' => $request->pegawainip,
            'nama' => $request->pegawainama,
            'jabatan' => $request->pegawaitype,
            'spv' => $request->pegawaispv,
            'pic' => '$request->pegawaipic',
            'tgl_bergabung' => $request->pegawaitglbergabung,
            'tgl_selesai' => $request->pegawaitglselesai,
            'kantor_id' => json_encode($request->pegawaikantor),
        ]);
        if (!$p) {
            return Redirect::back()->with('info', 'Gagal Simpan');
        }
        $user['jabatan_id'] = $p->id;
        $user['role'] = $request->pegawaitype;
        $user['status'] = $request->pegawaistatus[0];

        $u =  User::updateOrCreate([
            'id' => $request->pegawaiaaa
        ], $user);
        if (!$u) {
            return Redirect::back()->with('info', 'Gagal Simpan');
        }
        return Redirect::back()->with('info', 'Berhasil Simpan');
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
        session()->put('tab', 5);
        session()->put('subtab', 1);

        if (!$id) {
            return Redirect::back()->with('info', 'Data Tidak Ditemukan');
        }
        $u = User::where('id', $id)->first();
        if ($u->jabatan_id) {
            $p = AJabatanModel::where('id', $u->jabatan_id)->delete();
            if (!$p) {
                return Redirect::back()->with('info', 'Gagal Hapus Pegawai');
            }
        }
        $u = User::where('id', $id)->delete();
        if (!$u) {
            return Redirect::back()->with('info', 'Gagal Hapus User');
        }
        return Redirect::back()->with('info', 'Berhasil Hapus');
    }
}
