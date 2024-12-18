<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'anggota';
    use HasFactory;
    protected $fillable = ['nama', 'nisn', 'angkatan', 'kelas'];
}
