<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ALantaiModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'kantor_id',
        'gedung_id',
        'lantai',
    ];
}
