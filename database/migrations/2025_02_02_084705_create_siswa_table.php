<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('nisn', 10)->primary(); // NISN sebagai primary key
            $table->string('nama', 50);
            $table->enum('kelas', ['X', 'XI', 'XII']);
            $table->enum('jurusan', ['RPL', 'TKJ', 'TKI', 'TEI', 'BR', 'ATPH', 'ORACLE', 'AXIOO']);
            $table->string('alamat', 100);
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa'); // Menghapus tabel jika migrasi dibatalkan
    }
}