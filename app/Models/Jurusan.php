<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusan'; // Nama tabel di database
    protected $primaryKey = 'id_jurusan';
    public $timestamps = false;

    // Definisikan relasi dengan model Nasabah jika diperlukan
    public function nasabah()
{
    return $this->hasMany(Nasabah::class, 'id_jurusan');
}
}


