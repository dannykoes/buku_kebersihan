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
            $namaMerchant = Auth::user()->merchant['nama'];
            $cloudinary = $cdl->uploadApi()->upload($image, ['folder' => $namaMerchant . '/Profile/']);
            $bukti = $cloudinary['secure_url'];
            if ($request->public_id != '') {
                $cdl->uploadApi()->destroy($request->public_id);
            }
            ProfileUsrModel::UpdateOrCreate(['id' => $request->id], [
                'user_id',
                'nama',
                'nohp',
                'alamat',
                'image',
                'public_key',
                'status'
            ]);
        }
    }
}
