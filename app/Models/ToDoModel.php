<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoModel extends Model
{
    use HasFactory;
    protected $table = 'todo';
    protected $fillable = [
        'user_id',
        'type',
        'ruang_id',
        'job_id',
        'tanggal',
        'sebelum',
        'sesudah',
    ];
}
