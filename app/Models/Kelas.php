<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas'; // Nama tabel di database
    protected $primaryKey = 'id_kelas';
    public $timestamps = false;

    // Definisikan relasi dengan model Nasabah jika diperlukan
    public function nasabah()
{
    return $this->hasMany(Nasabah::class, 'id_kelas');
}
}

