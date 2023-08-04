<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TodoNewModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'status',
        'id_pegawai',
        'tanggal',
        'tugas',
        'foto',
    ];
}
