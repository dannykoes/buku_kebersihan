<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TodoNewModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardAPIController extends Controller
{
    public function dashboardcontroller()
    {
        $dat = TodoNewModel::where('id_pegawai', Auth::user()->id)->get();

        $eventlist = [];
        foreach ($dat as $key => $v) {
            $statuscolor = 'red';
            if ($v->status == 0) {
                $statuscolor = 'yellow';
            } elseif ($v->status == 1) {
                $statuscolor = 'green';
            } else {
                $statuscolor = 'red';
            }

            $eventlist[] = array(
                'judul' => 'Task',
                'color' => $statuscolor,
                'event_desc' => 'Task cleaning ' . Carbon::parse($v->created_at)->format('Y-m-d'),
                'tahun' => Carbon::parse($v->created_at)->year,
                'bulan' => Carbon::parse($v->created_at)->month,
                'hari' => Carbon::parse($v->created_at)->day,
                'jam' => (int) Carbon::parse($v->created_at)->format('H'),
                'mnt' => (int) Carbon::parse($v->created_at)->format('i'),
            );
        }

        return response()->json([
            'success' => true,
            'data' => $eventlist
        ]);
    }
}
