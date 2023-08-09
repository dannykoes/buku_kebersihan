<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ARoleModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama',
        'urutan',
        'menu',
    ];
}
