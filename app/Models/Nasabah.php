<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Nasabah extends Model
{
    use HasFactory;

    protected $table = 'nasabah'; // Ganti dengan nama tabel Anda jika berbeda
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $casts = [
        'tanggal_pembuatan' => 'date',
    ];

    protected $fillable = [
        'nama',
        'id_kelas',
        'id_jurusan',
        'jenis_kelamin',
        'tanggal_pembuatan',
        'saldo',
        'status',
        'rekening',
        'nis',
        'password',
        'role'
    ];

    // Set default values for attributes
    protected $attributes = [
        'password' => 'dimas',
    ];

    // Definisikan relasi dengan model Kelas
    // Model Nasabah.php
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

}
