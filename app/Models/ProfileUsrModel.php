<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfileUsrModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "profile_user";
    protected $fillable = [
        'user_id',
        'nama',
        'nohp',
        'alamat',
        'image',
        'public_key',
        'status'
    ];
}
