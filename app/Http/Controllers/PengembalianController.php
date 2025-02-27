<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    // Menampilkan semua data pengembalian
    public function index()
    {
        $pengembalian = Pengembalian::all();
        return view('pengembalian.index', compact('pengembalian'));
    }

    // Menampilkan form untuk menambah pengembalian
    public function create()
    {
        return view('pengembalian.create'); // Menampilkan form untuk menambah pengembalian
    }

    // Menyimpan data pengembalian baru
    public function store(Request $request)
    {
        $request->validate([
            'id_peminjaman' => 'required|integer',
            'tanggal_kembali' => 'required|date',
            'jumlah' => 'required|integer',
            'kondisi_barang' => 'nullable|in:baik,rusak',
        ]);

        $pengembalian = Pengembalian::create($request->all());
        return redirect()->route('pengembalian.index')->with('success', 'Pengembalian berhasil ditambahkan.');
    }

    // Menampilkan data pengembalian berdasarkan ID
    public function show($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        return view('pengembalian.show', compact('pengembalian')); // Menampilkan detail pengembalian
    }

    // Menampilkan form untuk mengedit pengembalian
    public function edit($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        return view('pengembalian.edit', compact('pengembalian')); // Menampilkan form untuk mengedit pengembalian
    }

    // Mengupdate data pengembalian
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_peminjaman' => 'required|integer',
            'tanggal_kembali' => 'required|date',
            'jumlah' => 'required|integer',
            'kondisi_barang' => 'nullable|in:baik,rusak',
        ]);

        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->update(attributes: $request->all());
        return redirect()->route('pengembalian.index')->with('success', 'Pengembalian berhasil diperbarui.');
    }

    // Menghapus data pengembalian
    public function destroy($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->delete();
        return redirect()->route('pengembalian.index')->with('success', 'Pengembalian berhasil dihapus.');
    }
}