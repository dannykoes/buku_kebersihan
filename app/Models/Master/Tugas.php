<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tugas extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'ruangan_id',
        'kantor_id',
        'nama',
        'merchant_id',
        'tugas_mingguan',
        'tugas_bulanan',
        'nama_tugas',
        'id_pengguna',
        'kategori',
        'lantai_id',
        'json_additional',
    ];

    protected $appends = ['namakategori'];

    public function getNamaKategoriAttribute()
    {
        if (array_key_exists('kategori', $this->attributes)) {
            if ($this->attributes['kategori'] == 1) {
                return 'Harian';
            }
            if ($this->attributes['kategori'] == 2) {
                return 'Mingguan';
            }
            if ($this->attributes['kategori'] == 3) {
                return 'Bulanan';
            }
            return 'Tidak Ditemukan';
        }
    }
}
