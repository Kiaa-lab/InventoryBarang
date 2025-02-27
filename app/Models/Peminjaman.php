<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman'; // Tabel yang mendasari

    protected $primaryKey = 'id_peminjaman'; // Primary key

    protected $fillable = [
        'id_barang',
        'tanggal_pinjam',
        'jumlah',
        'status',
        'nisn',
        'nip',
    ];

    public $timestamps = false; // Menonaktifkan timestamps

    // Relasi ke model Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }

    // Relasi ke model Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'nip', 'nip');
    }
}