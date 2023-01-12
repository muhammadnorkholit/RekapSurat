<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
class Jurusan extends Model
{
    use HasFactory;
    protected $table = "jurusan";

      public function kelas()
    {
        return $this->hasMany(Kelas::class,'id_jurusan');
    }
}
