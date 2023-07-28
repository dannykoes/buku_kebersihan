<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PembagiantugasModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "pembagian_tugas";
    protected $fillable = [
        'user_id',
        'tugas_mingguan',
        'tugas_bulanan',
        'tugas_harian'
    ];
}
