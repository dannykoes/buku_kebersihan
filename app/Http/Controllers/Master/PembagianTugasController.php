<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\PembagiantugasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PembagianTugasController extends Controller
{
    public function simpanpembagian(Request $request)
    {

        // return $request->all();
        session()->put('tab', 6);
        $validator = Validator::make($request->all(), [
            'pengguna' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all())->with('error', 'Harap Cek Data Kembali');
        }
        $k =  PembagiantugasModel::updateOrCreate([
            'user_id' => $request->pengguna,
            // 'id' => $request->idpbgn
        ], [
            'user_id' => $request->pengguna,
            'tugas_harian' => json_encode($request->tugas_harian),
            'tugas_bulanan' => json_encode($request->tugas_bulanan),
            'tugas_mingguan' => json_encode($request->tugas_mingguan),
        ]);
        if ($k) {
            // return Redirect::back()->with('info', 'Tersimpan');
            return redirect('/master')->with('info', 'Data tersimpan');
        }
    }

    public function hapuspembagianjob($id)
    {
        session()->put('tab', 6);
        $k = PembagiantugasModel::where('id', $id)->delete();
        if ($k) {
            return Redirect::back()->with('info', 'Data Terhapus');
        }
        return Redirect::back()->with('error', 'Data Gagal Terhapus');
    }
}
