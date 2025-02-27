<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa'; // Nama tabel di database

    protected $primaryKey = 'nisn'; // Menentukan kolom primary key

    public $incrementing = false; // Menonaktifkan auto-increment jika primary key bukan integer
    protected $keyType = 'string'; // Menentukan tipe primary key jika bukan integer

    protected $fillable = [
        'nisn',   // NISN siswa
        'nama',   // Nama siswa
        'kelas',  // Kelas siswa
        'jurusan', // Jurusan siswa
        'alamat', // Alamat siswa
    ];

    public $timestamps = false; // Menonaktifkan timestamps jika tidak digunakan
}