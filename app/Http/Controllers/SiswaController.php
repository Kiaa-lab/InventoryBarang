<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Menambahkan fitur pencarian (opsional)
        $search = $request->get('search');
        $siswas = Siswa::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%")
                         ->orWhere('nisn', 'like', "%{$search}%");
        })->get(); // Mengambil semua data siswa

        return view('siswa.index', compact('siswas', 'search')); // Mengirim data ke view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create'); // Menampilkan form untuk menambah siswa
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nisn' => 'required|string', // NISN harus unik
            'nama' => 'required|string|max:50',
            'kelas' => 'required|in:X,XI,XII',
            'jurusan' => 'required|in:RPL,TKJ,TKI,TEI,BR,ATPH,ORACLE,AXIOO',
            'alamat' => 'required|string|max:50',
        ]);

        // Menyimpan data siswa baru
        Siswa::create($request->all());
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan.'); // Redirect ke index
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $nisn
     * @return \Illuminate\Http\Response
     */
    public function show($nisn)
    {
        $siswa = Siswa::findOrFail($nisn); // Mencari siswa berdasarkan NISN
        return view('siswa.show', compact('siswa')); // Menampilkan detail siswa
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $nisn
     * @return \Illuminate\Http\Response
     */
    public function edit($nisn)
    {
        $siswa = Siswa::findOrFail($nisn); // Mencari siswa berdasarkan NISN
        return view('siswa.edit', compact('siswa')); // Menampilkan form edit
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $nisn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nisn)
    {
        // Validasi input
        $request->validate([
            'nisn' => 'required',
            'nama' => 'required|string|max:50',
            'kelas' => 'required|in:X,XI,XII',
            'jurusan' => 'required|in:RPL,TKJ,TKI,TEI,BR,ATPH,ORACLE,AXIOO',
            'alamat' => 'required|string|max:50', // Menandai alamat sebagai wajib diisi
        ]);

        $siswa = Siswa::findOrFail($nisn); // Mencari siswa berdasarkan NISN
        $siswa->update($request->all()); // Memperbarui data siswa
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui.'); // Redirect ke index
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $nisn
     * @return \Illuminate\Http\Response
     */
    public function destroy($nisn)
    {
        $siswa = Siswa::findOrFail($nisn); // Mencari siswa berdasarkan NISN
        $siswa->delete(); // Menghapus siswa
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus.'); // Redirect ke index
    }
}