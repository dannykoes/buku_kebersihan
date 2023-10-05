<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AObjectModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'kantor_id',
        'gedung_id',
        'lantai_id',
        'ruangan_id',
        'outdoor_id',
        'toilet_id',
        'kategori',
        'object',
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
