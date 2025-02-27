<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = barang::all(); // Mengambil semua data barang
        return view('barangs.index', compact('barangs')); // Mengirim data ke view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barangs.create'); // Menampilkan form untuk menambah barang
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'kategori' => 'nullable|string|max:50',
            'stok' => 'required|integer',
            'kondisi' => 'required|in:baik,rusak',
            'deskripsi' => 'nullable|string',
        ]);

        Barang::create($request->all()); // Menyimpan data barang baru
        return redirect()->route('barangs.index')->with('success', 'Barang berhasil ditambahkan.'); // Redirect ke index
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::findOrFail($id); // Mencari barang berdasarkan ID
        return view('barangs.show', compact('barang')); // Menampilkan detail barang
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id); // Mencari barang berdasarkan ID
        return view('barangs.edit', compact('barang')); // Menampilkan form edit
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'kategori' => 'nullable|string|max:50',
            'stok' => 'required|integer',
            'kondisi' => 'required|in:baik,rusak',
            'deskripsi' => 'nullable|string',
        ]);

        $barang = Barang::findOrFail($id); // Mencari barang berdasarkan ID
        $barang->update($request->all()); // Memperbarui data barang
        return redirect()->route('barangs.index')->with('success', 'Barang berhasil diperbarui.'); // Redirect ke index
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id); // Mencari barang berdasarkan ID
        $barang->delete(); // Menghapus barang
        return redirect()->route('barangs.index')->with('success', 'Barang berhasil dihapus.'); // Redirect ke index
    }
}