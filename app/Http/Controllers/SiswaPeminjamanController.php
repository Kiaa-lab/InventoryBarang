<?php
namespace App\Http\Controllers;

use App\Models\Barang; // Pastikan Anda memiliki model Barang
use App\Models\Peminjaman; // Pastikan Anda memiliki model Peminjaman
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaPeminjamanController extends Controller
{
    public function create()
    {
        // Ambil data barang
        $barangs = Barang::all();

        // Ambil data siswa berdasarkan NISN yang login
        $siswa = Auth::user(); // Asumsi Anda menggunakan Auth untuk mendapatkan pengguna yang login

        return view('siswa.peminjaman.create', [
            'barangs' => $barangs,
            'siswa' => $siswa // Mengirimkan data siswa yang sedang login
        ]);
        
    }

    public function index()
    {
    $peminjaman = Peminjaman::where('nisn', Auth::user()->nisn)->get();
    return view('siswa.peminjaman.index', compact('peminjaman'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_barang' => 'required',
            'tanggal_pinjam' => 'required|date',
            'jumlah' => 'required|integer|min:1',
        ]);

        // Ambil NISN dari pengguna yang sedang login
        $nisn = Auth::user()->nisn;

        // Simpan peminjaman
        Peminjaman::create([
            'id_barang' => $request->id_barang,
            'nisn' => $nisn, // Gunakan NISN dari pengguna yang login
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil disimpan.');
    }
}