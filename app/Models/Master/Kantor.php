<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kantor extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama',
        'merchant_id',
        'client_id',
    ];
}
