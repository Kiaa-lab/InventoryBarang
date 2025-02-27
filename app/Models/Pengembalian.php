<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = 'pengembalian';

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'id_peminjaman',
        'tanggal_kembali',
        'jumlah',
        'kondisi_barang',
        'created_at',
    ];

    // Jika Anda menggunakan kolom primary key yang berbeda
    protected $primaryKey = 'id_pengembalian'; // Ganti dengan nama kolom primary key Anda

    // Jika Anda ingin mengatur timestamp secara manual
    public $timestamps = false; // Set true jika Anda ingin menggunakan created_at dan updated_at
}