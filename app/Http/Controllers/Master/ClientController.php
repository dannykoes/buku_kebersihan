<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\ClientModel;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
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


        session()->put('tab', 0);
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'perusahaan' => 'required',
            'kontak' => 'required',
            'pic' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all())->with('error', 'Harap Cek Data Kembali');
        }

        $k =  ClientModel::updateOrCreate([
            'id' => $request->id
        ], [
            'perusahaan' => $request->perusahaan,
            'kontak' => $request->kontak,
            'pic' => $request->pic,
            'email' => $request->email,
        ]);
        if ($k) {
            // return Redirect::back()->with('info', 'Tersimpan');
            return redirect('/master')->with('info', 'Data tersimpan');
        }

        // return Redirect::back()->with('info', 'Tersimpan');
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
        session()->put('tab', 0);

        $k = ClientModel::where('id', $id)->delete();
        if ($k) {
            return Redirect::back()->with('info', 'Data Terhapus');
        }
        return Redirect::back()->with('error', 'Data Gagal Terhapus');
    }

    public function getclient($id)
    {
        return ClientModel::where('id', $id)->get();
    }
}
