<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang'; // Tabel barang

    protected $primaryKey = 'id_barang'; // Primary key

    protected $fillable = [
        'nama_barang', // Pastikan ada kolom nama_barang
        // kolom lain yang diperlukan
    ];

    public $timestamps = false; // Menonaktifkan timestamps

    // Relasi ke model Peminjaman
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_barang', 'id_barang');
    }
}