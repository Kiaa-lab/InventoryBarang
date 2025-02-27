<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Siswa;
use App\Models\Barang;
use App\Models\Guru; // Pastikan Anda mengimpor model Guru
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Import facade Log

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $peminjamans = Peminjaman::with(['siswa', 'barang'])
            ->when($search, function ($query) use ($search) {
                return $query->whereHas('siswa', function ($q) use ($search) {
                    $q->where('nisn', 'like', "%{$search}%")
                      ->orWhere('nama', 'like', "%{$search}%"); 
                })->orWhereHas('barang', function ($q) use ($search) {
                    $q->where('id_barang', 'like', "%{$search}%")
                      ->orWhere('nama_barang', 'like', "%{$search}%"); 
                })->orWhere('nip', 'like', "%{$search}%"); 
            })
            ->get();

        Log ::info('User  accessed the index of peminjaman', ['search' => $search]);

        return view('view_peminjaman1.index', compact('peminjamans', 'search'));
    }

    public function create()
    {
        $siswas = Siswa::all();
        $barangs = Barang::all();
        $gurus = Guru::all(); 
        Log::info('User  accessed the create form for peminjaman');

        return view('view_peminjaman1.create', compact('siswas', 'barangs', 'gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|integer|exists:barang,id_barang',
            'tanggal_pinjam' => 'required|date',
            'jumlah' => 'required|integer|min:1',
            'nisn' => 'required|string|exists:siswa,nisn', // Memastikan nisn ada di tabel siswa
            'nip' => 'nullable|string|exists:guru,nip', // Validasi untuk nip jika diperlukan
        ]);

        Peminjaman::create([
            'id_barang' => $request->id_barang,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'jumlah' => $request->jumlah,
            'status' => 'dipinjam',
            'nisn' => $request->nisn,
            'nip' => $request->nip, // Menyimpan nip jika ada
        ]);

        Log::info('New peminjaman created', [
            'id_barang' => $request->id_barang,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'jumlah' => $request->jumlah,
            'nisn' => $request->nisn,
            'nip' => $request->nip,
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    public function show($id)
    {
        $peminjaman = Peminjaman::with(['barang', 'siswa'])->findOrFail($id);
        Log::info('User  accessed peminjaman details', ['id' => $id]);

        return view('view_peminjaman1.show', compact('peminjaman'));
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $siswas = Siswa::all();
        $barangs = Barang::all();
        $gurus = Guru::all(); // Mengambil semua data guru
        Log::info('User  accessed the edit form for peminjaman', ['id' => $id]);

        return view('view_peminjaman1.edit', compact('peminjaman', 'siswas', 'barangs', 'gurus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required|integer|exists:barang,id_barang',
            'tanggal_pinjam' => 'required|date',
            'jumlah' => 'required|integer|min:1',
            'nisn' => 'required|string|exists:siswa,nisn', // Memastikan nisn ada di tabel siswa
            'nip' => 'nullable|string|exists:guru,nip', // Validasi untuk nip jika diperlukan
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'id_barang' => $request->id_barang,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'jumlah' => $request->jumlah,
            'nisn' => $request->nisn,
            'nip' => $request->nip, // Memperbarui nip jika ada
        ]);

        Log::info('Peminjaman updated', [
            'id' => $id,
            'id_barang' => $request->id_barang,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'jumlah' => $request->jumlah,
            'nisn' => $request->nisn,
            'nip' => $request->nip,
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();
        Log::info('Peminjaman deleted', ['id' => $id]);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus.');
    }
}