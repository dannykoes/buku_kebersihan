<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "client";
    protected $fillable = [
        'perusahaan',
        'kontak',
        'pic',
        'email',
    ];
}
