<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Kos;
use App\Models\Pengguna;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenghuniController extends Controller
{
    // public function index() {
    //     return view('penghuni.index');
    // }

    public function showAllKos()
    {
        $listKos = Kos::with(['pengguna', 'kamar'])->withCount('kamar')->get();
        return view('penghuni.index', [
            "listKos" => $listKos
        ]);
    }

    public function showAllKamar()
    {
        $kosId = session()->get('kos_id'); // Jika Anda menggunakan session untuk menyimpan ID
        // Ambil data kos berdasarkan ID
        $kos = Kos::find($kosId);

        $listKamar = Kamar::query()->get();
        return view('penghuni.kos.index', [
            "listKamar" => $listKamar,
            "listKos" => $kos
        ]);
    }

    public function show($id)
    {
        // Ambil data kos berdasarkan ID
        $kos = Kos::find($id);

        // Cek apakah kos ditemukan
        if ($kos) {
            return response()->json([
                'name' => $kos->name,
                'contact_person' => $kos->contact_person,
                'alamat' => $kos->alamat,
                'catatan' => $kos->catatan,
            ]);
        } else {
            return response()->json(['error' => 'Kos not found'], 404);
        }
    }

    public function pesanKamar(Request $request, $kamarId)
    {
        // Validasi data (misalnya, apakah user sudah login)
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu!');
        }

         // Mengambil ID user yang sedang login
         $username = Auth::id(); // Atau Auth::user()->id
         $userId = Pengguna::query()->where('username', $username)->first()->id;

        // Cek apakah kamar ada
        $kamar = Kamar::find($kamarId);
        if (!$kamar) {
            return redirect()->back()->with('error', 'Kamar tidak ditemukan!');
        }

        // Simpan pemesanan ke database
        $pemesanan = new Pesanan();
        $pemesanan->id_pengguna = $userId;  // Mengambil ID pengguna yang sedang login
        $pemesanan->id_kamar = $kamarId;
        $pemesanan->status_pemesanan = 'pending';  // Status pemesanan
        $pemesanan->save();

        // Mengarahkan ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Kamar berhasil dipesan!');
    }

    public function showPemesanan()
    {
        return view('penghuni.pemesanan.index');
    }
}
