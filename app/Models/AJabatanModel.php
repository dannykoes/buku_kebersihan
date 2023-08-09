<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AJabatanModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nip',
        'nama',
        'jabatan',
        'spv',
        'pic',
        'tgl_bergabung',
        'tgl_selesai',
    ];
}
