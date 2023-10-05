<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\AOutdoorModel;
use App\Models\AToiletModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AOutdoorController extends Controller
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
        session()->put('tab', 10);
        $validator = Validator::make($request->all(), [
            'outdoorkantorid' => 'required',
            'outdoorgedungid' => 'required',
            'outdoorlantaiid' => 'required',
            'outdoornama' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all())->with('error', 'Harap Cek Data Kembali');
        }
        $k =  AOutdoorModel::updateOrCreate([
            'id' => $request->outdoorid
        ], [
            'kantor_id' => $request->outdoorkantorid,
            'gedung_id' => $request->outdoorgedungid,
            'lantai_id' => $request->outdoorlantaiid,
            'outdoor' => $request->outdoornama,
        ]);
        if ($k) {
            return Redirect::back()->with('info', 'Berhasil Simpan');
        }
        return Redirect::back()->with('info', 'Gagal Simpan');
    }

    public function gettoiletoutdoor(Request $request)
    {
        $data = [];
        if ($request->ajax()) {
            $data['toilet'] = AToiletModel::where('kantor_id', $request->kantor)
                ->where('gedung_id', $request->gedung)
                ->where('lantai_id', $request->lantai)
                ->get();
            $data['outdoor'] = AOutdoorModel::where('kantor_id', $request->kantor)
                ->where('gedung_id', $request->gedung)
                ->where('lantai_id', $request->lantai)
                ->get();
        }
        return response()->json($data, 200);
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
        session()->put('tab', 10);
        $k = AOutdoorModel::where('id', $id)->delete();
        if ($k) {
            return Redirect::back()->with('info', 'Berhasil Hapus');
        }
        return Redirect::back()->with('error', 'Gagal Hapus');
    }
}
