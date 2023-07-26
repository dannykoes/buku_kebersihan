<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lantai extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'kantor_id',
        'ruangan_id',
        'lantai',
        'merchant_id',
    ];
}
