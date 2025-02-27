<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';

    protected $primaryKey = 'nip';

    public $incrementing = false; // Karena nip bukan auto increment

    public $timestamps = false; // Menonaktifkan timestamps

    protected $fillable = [
        'nip',
        'nama',
        'alamat',
        'mata_pelajaran',
        'tanggal_lahir',
        'telepon',
    ];
}