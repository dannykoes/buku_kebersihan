<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\AGedungModel;
use App\Models\AJobModel;
use App\Models\AKantorModel;
use App\Models\ALantaiModel;
use App\Models\ALokasiModel;
use App\Models\AObjectModel;
use App\Models\APekerjaanModel;
use App\Models\ARoleModel;
use App\Models\ARuanganModel;
use App\Models\Master\ClientModel;
use App\Models\Master\Kantor;
use App\Models\Master\Lantai;
use App\Models\Master\PembagiantugasModel;
use App\Models\Master\Ruangan;
use App\Models\Master\Tugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index(Request $request)
    {
        if ($request->ajax()) {
            $data['onlypegawai'] = User::select(
                'users.id as user_id',
                'users.name',
                'users.role',
                'users.status',
                'a_jabatan_models.*',
            )
                ->leftJoin('a_jabatan_models', 'a_jabatan_models.id', 'users.jabatan_id')
                ->where(function ($query) use ($request) {
                    if ($request->status) {
                        return $query->where('role', $request->status);
                    }
                    return $query->where('role', '>=', 5)->where('role', '<=', 6);
                })
                ->where(function ($query) use ($request) {
                    if ($request->kantor) {
                        $x = explode(',', $request->kantor);
                        foreach ($x as $key => $value) {
                            $query->orWhere('kantor_id', 'like', '%' . $value . '%');
                        }
                    }
                })
                ->get();
            return $data;
        }
        $data = [];
        $data['kantor'] = AKantorModel::get();
        $data['gedung'] = AGedungModel::select(
            'a_gedung_models.*',
            'a_kantor_models.nama',
            'a_kantor_models.pic',
        )
            ->join('a_kantor_models', 'a_kantor_models.id', 'a_gedung_models.kantor_id')
            ->get();
        $data['lantai'] = ALantaiModel::select(
            'a_lantai_models.*',
            'a_kantor_models.nama',
            'a_kantor_models.pic',
            'a_gedung_models.gedung',

        )
            ->join('a_kantor_models', 'a_kantor_models.id', 'a_lantai_models.kantor_id')
            ->join('a_gedung_models', 'a_gedung_models.id', 'a_lantai_models.gedung_id')
            ->get();
        $data['ruangan'] = ARuanganModel::select(
            'a_ruangan_models.*',
            'a_kantor_models.nama',
            'a_kantor_models.pic',
            'a_gedung_models.gedung',
            'a_lantai_models.lantai',
        )
            ->join('a_kantor_models', 'a_kantor_models.id', 'a_ruangan_models.kantor_id')
            ->join('a_gedung_models', 'a_gedung_models.id', 'a_ruangan_models.gedung_id')
            ->join('a_lantai_models', 'a_lantai_models.id', 'a_ruangan_models.lantai_id')
            ->get();
        $data['lokasi'] = ALokasiModel::select()
            ->get();
        $data['objek'] = AObjectModel::select(
            'a_object_models.*',
            // 'a_kantor_models.nama',
            // 'a_kantor_models.pic',
            'a_gedung_models.gedung',
            'a_lantai_models.lantai',
            'a_ruangan_models.ruangan',
        )
            // ->join('a_kantor_models', 'a_kantor_models.id', 'a_object_models.kantor_id')
            ->join('a_gedung_models', 'a_gedung_models.id', 'a_object_models.gedung_id')
            ->join('a_lantai_models', 'a_lantai_models.id', 'a_object_models.lantai_id')
            ->join('a_ruangan_models', 'a_ruangan_models.id', 'a_object_models.ruangan_id')
            ->get();
        foreach ($data['objek'] as $key => $v) {
            $kantor = json_decode($v->kantor_id) ? json_decode($v->kantor_id) : false;
            $v->kantor = is_array($kantor);
            if ($v->kantor) {
                $v->kantor = AkantorModel::whereIn('id', $kantor)->get();
            }
            $pekerjaan = json_decode($v->object) ? json_decode($v->object) : false;
            $v->pekerjaan = false;
            if ($pekerjaan) {
                $v->pekerjaan = APekerjaanModel::whereIn('id', $pekerjaan)->get();
            }
        }
        // return $data['objek'];
        $data['jabatan'] = ARoleModel::get();
        $data['pegawai'] = User::select(
            'a_jabatan_models.*',
            'a_jabatan_models.kantor_id',
            'users.id as user_id',
            'users.name',
            'users.role',
            'users.status',
        )
            ->leftJoin('a_jabatan_models', 'a_jabatan_models.id', 'users.jabatan_id')
            ->get();
        foreach ($data['pegawai'] as $key => $value) {
            $value->kantor = [];
            $value->supervisor = [];
            if ($value->kantor_id) {
                $j = json_decode($value->kantor_id);
                if (is_array($j)) {
                    $value->kantor = AKantorModel::whereIn('id', $j)->get();
                }
            }
            if ($value->spv) {
                $s = json_decode($value->spv);
                if (is_array($s)) {
                    $value->supervisor = User::whereIn('id', $s)->get();
                }
            }
            if ($value->jabatan == 1) {
                $value->namajabatan = 'Administrator';
            }
            if ($value->jabatan == 2) {
                $value->namajabatan = 'Direksi';
            }
            if ($value->jabatan == 3) {
                $value->namajabatan = 'Kepala Cabang';
            }
            if ($value->jabatan == 4) {
                $value->namajabatan = 'User';
            }
            if ($value->jabatan == 5) {
                $value->namajabatan = 'Kepala Supervisor';
            }
            if ($value->jabatan == 6) {
                $value->namajabatan = 'Supervisor';
            }
            if ($value->jabatan == 7) {
                $value->namajabatan = 'Pegawai';
            }
        }
        // return $data;
        $data['onlypegawai'] = User::select(
            'users.id as user_id',
            'users.name',
            'users.role',
            'users.status',
            'a_jabatan_models.*',
        )
            ->leftJoin('a_jabatan_models', 'a_jabatan_models.id', 'users.jabatan_id')
            ->where(function ($query) use ($request) {
                if ($request->status) {
                    return $query->where('role', $request->status);
                }
                return $query->where('role', 7);
            })
            ->get();
        $data['job'] = AJobModel::select(
            'a_job_models.*',
            'users.name',
            'a_kantor_models.pic',
        )
            ->join('users', 'users.id', 'a_job_models.user_id')
            ->leftJoin('a_kantor_models', 'a_kantor_models.id', 'a_job_models.kantor_id')
            ->get();
        foreach ($data['job'] as $key => $v) {
            $v->jobs = [];
            $v->lantais = [];
            if ($v->objek_id) {
                $v->jobs = AGedungModel::whereIn('id', json_decode($v->objek_id))->get();
            }
            if ($v->lantai_id) {
                $v->lantais = ALantaiModel::whereIn('id', json_decode($v->lantai_id))->get();
            }
        }
        $data['pekerjaan'] = APekerjaanModel::get();
        $data['pengguna'] = [];
        $data['tugas'] = [];
        $data['userptg'] = [];
        $data['pgntgs'] = [];
        // return $data;
        return view('backend.masterdata.main', $data);
    }
    public function indexlama()
    {
        $data = [];
        $data['client'] = ClientModel::get();
        $data['pengguna'] = User::leftJoin('client', 'client.id', '=', 'users.client_id')->get(['client.perusahaan', 'users.*']);
        $data['kantor'] = Kantor::leftJoin('client', 'client.id', '=', 'kantors.client_id')->get(['client.perusahaan', 'kantors.*']);
        $data['ruangan'] = Ruangan::select(
            'ruangans.*',
            'kantors.nama as namakantor',
        )
            ->join('kantors', 'kantors.id', 'ruangans.kantor_id')
            ->get();
        $data['lantai'] = Lantai::select(
            'lantais.*',
            'kantors.nama as namakantor',
            'ruangans.ruangan as namaruangan',
        )
            ->leftJoin('kantors', 'kantors.id', 'lantais.kantor_id')
            ->leftJoin('ruangans', 'ruangans.id', 'lantais.ruangan_id')
            ->get();
        $data['tugas'] = Tugas::select(
            'tugas.*',
            'kantors.nama as namakantor',
            'lantais.lantai as namaruangan',
            'users.name',
        )
            ->leftJoin('kantors', 'kantors.id', 'tugas.kantor_id')
            ->leftJoin('lantais', 'lantais.id', 'tugas.ruangan_id')
            ->leftJoin('users', 'users.id', 'tugas.id_pengguna')
            ->get();

        // $usr = User::where('role', 3)->get();

        $data['userptg'] = User::where('role', 3)->get();
        // foreach ($usr as $key => $value) {
        //     $checktgs = PembagiantugasModel::where('user_id', $value->id)->get();
        //     // $value->check = $checktgs->isNotEmpty();
        //     $truefalse = $checktgs->isNotEmpty();
        //     if ($truefalse == false) {
        //         $data['userptg'][] = $value;
        //     }
        // }

        $data['pgntgs'] = PembagiantugasModel::leftJoin('users', 'users.id', '=', 'pembagian_tugas.user_id')
            ->get(['users.name', 'pembagian_tugas.*']);

        foreach ($data['pgntgs'] as $key => $value) {

            $datharian = json_decode($value->tugas_harian);
            $datmingguan = json_decode($value->tugas_mingguan);
            $datbulanan = json_decode($value->tugas_bulanan);

            if ($datharian != null) {
                $value->jobharian = Tugas::leftJoin('ruangans', 'ruangans.id', 'tugas.ruangan_id')
                    ->leftJoin('kantors', 'kantors.id', 'tugas.kantor_id')
                    ->whereIn('tugas.id', $datharian)
                    ->get(['ruangans.ruangan', 'kantors.nama', 'tugas.*']);
            } else {
                $value->jobharian = [];
            }
            if ($datmingguan != null) {
                $value->jobmingguan = Tugas::leftJoin('ruangans', 'ruangans.id', 'tugas.ruangan_id')
                    ->leftJoin('kantors', 'kantors.id', 'tugas.kantor_id')
                    ->whereIn('tugas.id', $datmingguan)
                    ->get(['ruangans.ruangan', 'kantors.nama', 'tugas.*']);
            } else {
                $value->jobmingguan = [];
            }

            if ($datbulanan != null) {
                $value->jobbulanan = Tugas::leftJoin('ruangans', 'ruangans.id', 'tugas.ruangan_id')
                    ->leftJoin('kantors', 'kantors.id', 'tugas.kantor_id')
                    ->whereIn('tugas.id', $datbulanan)
                    ->get(['ruangans.ruangan', 'kantors.nama', 'tugas.*']);
            } else {
                $value->jobbulanan = [];
            }
        }

        // return $data;

        // $tagsharian = Tugas::select('nama')->distinct('nama')->pluck('nama')->toArray();
        // $tagsmingguan = Tugas::select('tugas_mingguan')->distinct('tugas_mingguan')->pluck('tugas_mingguan')->toArray();
        // $tagsbulanan = Tugas::select('tugas_bulanan')->distinct('tugas_bulanan')->pluck('tugas_bulanan')->toArray();
        // $data['tagtugas'] = [];
        // $data['tagtugasminggu'] = [];
        // $data['tagtugasbulanan'] = [];

        // foreach ($tagsharian as $key => $value) {
        //     if ($value) {
        //         $js = json_decode($value);
        //         if ($js) {
        //             foreach ($js as $key => $v) {
        //                 if (!in_array($v, $data['tagtugas'])) {
        //                     array_push($data['tagtugas'], $v);
        //                 }
        //             }
        //         }
        //     }
        // }

        // foreach ($tagsmingguan as $key => $value) {
        //     if ($value) {
        //         $js = json_decode($value);
        //         if ($js) {
        //             foreach ($js as $key => $v) {
        //                 if (!in_array($v, $data['tagtugasminggu'])) {
        //                     array_push($data['tagtugasminggu'], $v);
        //                 }
        //             }
        //         }
        //     }
        // }

        // foreach ($tagsbulanan as $key => $value) {
        //     if ($value) {
        //         $js = json_decode($value);
        //         if ($js) {
        //             foreach ($js as $key => $v) {
        //                 if (!in_array($v, $data['tagtugasbulanan'])) {
        //                     array_push($data['tagtugasbulanan'], $v);
        //                 }
        //             }
        //         }
        //     }
        // }
        // return $data;
        return view('backend.master.main', $data);
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
        //
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
        //
    }
}
