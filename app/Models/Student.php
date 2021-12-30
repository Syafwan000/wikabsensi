<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Student as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Student extends Authenticatable
{
    use HasFactory;

    protected $table = 'students';
    protected $guard = 'students';
    protected $fillable = ['nis', 'nama', 'rombel', 'rayon', 'image', 'username', 'password'];
}
