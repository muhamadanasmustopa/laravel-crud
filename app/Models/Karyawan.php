<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table= 'karyawan';
    protected $fillable = ['nama', 'jenis_kelamin', 'no_hp', 'email', 'current_salary', 'foto',];
    
    use HasFactory;
}
