<?php

namespace App\Http\Controllers\API;

use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use App\Models\Master\ClientModel;
use App\Models\ProfileUsrModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileApiController extends Controller
{
    public function simpanprofile(Request $request)
    {


        if ($request->hasFile('profile')) {
            $image  = $request->file('profile')->getPathname();
            $cdl = GlobalHelper::cloudinarys();
            $clc = ClientModel::where('id', Auth::user()->client_id)->first();
            $cloudinary = $cdl->uploadApi()->upload($image, ['folder' => $clc['perusahaan'] . '/Profile/']);
            $bukti = $cloudinary['secure_url'];
            if ($request->public_id != '') {
                $cdl->uploadApi()->destroy($request->public_id);
            }
            ProfileUsrModel::UpdateOrCreate(['id' => $request->id], [
                'user_id' => Auth::user()->id,
                'nama' => $request->nama,
                'nohp' => $request->nohp,
                'alamat' => $request->alamat,
                'image' => $bukti,
                'public_key' => $cloudinary['public_id'],
                'status' => 0,
            ]);

            return response()->json([
                'success' => true,
                'msg' => 'Berhasil update profile',
            ]);
        }
        ProfileUsrModel::UpdateOrCreate(['id' => $request->id], [
            'user_id' => Auth::user()->id,
            'nama' => $request->nama,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
        ]);

        return response()->json([
            'success' => true,
            'msg' => 'Berhasil update profile'
        ]);
    }

    public function getDataprofile()
    {
        $dat = ProfileUsrModel::where('user_id', Auth::user()->id)->first();
        return response()->json([
            'success' => true,
            'data' => $dat
        ]);
    }
}
