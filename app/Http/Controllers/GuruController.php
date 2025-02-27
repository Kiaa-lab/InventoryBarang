<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    // Menampilkan daftar guru
    public function index()
    {
        $gurus = Guru::all();
        return view('guru.index', compact('gurus'));
    }

    // Menampilkan form untuk membuat guru baru
    public function create()
    {
        return view('guru.create');
    }

    // Menyimpan guru baru
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|string|max:20|unique:guru',
            'nama' => 'required|string|max:100',
            'alamat' => 'nullable|string|max:255',
            'mata_pelajaran' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'telepon' => 'nullable|string|max:15',
        ]);

        Guru::create($request->all());
        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    // Menampilkan detail guru
    public function show($nip)
    {
        $guru = Guru::findOrFail($nip);
        return view('guru.show', compact('guru'));
    }

    // Menampilkan form untuk mengedit guru
    public function edit($nip)
    {
        $guru = Guru::findOrFail($nip);
        return view('guru.edit', compact('guru'));
    }

    // Memperbarui data guru
    public function update(Request $request, $nip)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'nullable|string|max:255',
            'mata_pelajaran' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'telepon' => 'nullable|string|max:15',
        ]);

        $guru = Guru::findOrFail($nip);
        $guru->update($request->all());
        return redirect()->route('guru.index')->with('success', 'Guru berhasil diperbarui.');
    }

    // Menghapus guru
    public function destroy($nip)
    {
        $guru = Guru::findOrFail($nip);
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus.');
    }
}