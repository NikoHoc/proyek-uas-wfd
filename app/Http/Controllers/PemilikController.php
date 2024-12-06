<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Kos;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemilikController extends Controller
{
    // public function index()
    // {
    //     return view('pemilik_kos.index');
    // }

    public function showKos()
    {
        // Mengambil ID user yang sedang login
        $username = Auth::id(); // Atau Auth::user()->id
        $userId = Pengguna::query()->where('username', $username)->first()->id;

        // Mengambil data kos berdasarkan id user yang login
        $kos = Kos::query()
            ->where('id_pengguna', $userId) // Menggunakan ID user yang login
            ->get();

        // Kirim data ke view
        return view('pemilik_kos.index', [
            "kos" => $kos
        ]);
    }


    public function indexRequest()
    {
        // Mengambil ID user yang sedang login
        $username = Auth::id(); // Atau Auth::user()->id
        $userId = Pengguna::query()->where('username', $username)->first()->id;

        $kos = Kos::query()
            ->where('id_pengguna', $userId) // Sesuaikan nama kolom 'user_id' dengan skema database Anda
            ->get();

        return view('pemilik_kos.request.index', [
            "kos" => $kos
        ]);
    }

    public function indexLaporan()
    {
        // Mengambil ID user yang sedang login
        $username = Auth::id(); // Atau Auth::user()->id
        $userId = Pengguna::query()->where('username', $username)->first()->id;

        // Mengambil data kos berdasarkan id pengguna
        $kos = Kos::query()
            ->where('id_pengguna', $userId) // Sesuaikan nama kolom 'user_id' dengan skema database Anda
            ->get();

        // Mengambil semua ID kos yang sesuai dengan id_pengguna
        $kosIds = $kos->pluck('id'); // Mengambil daftar ID kos dalam bentuk array

        // Mengambil data kamar berdasarkan id_kos yang sesuai
        $listKamar = Kamar::query()
            ->whereIn('id_kos', $kosIds) // Mencocokkan id_kos dengan list ID kos
            ->get();

        return view('pemilik_kos.laporan.index', [
            "kos" => $kos,
            'listKamar' => $listKamar
        ]);
    }

    public function addKamar()
    {
        // Mengambil ID user yang sedang login
        $username = Auth::id(); // Atau Auth::user()->id
        $userId = Pengguna::query()->where('username', $username)->first()->id;

        // Mengambil data kos pertama berdasarkan id pengguna
        $kos = Kos::query()
            ->where('id_pengguna', $userId)
            ->first();

        // Pastikan kos ditemukan
        if (!$kos) {
            return redirect()->back()->with('error', 'Kos tidak ditemukan');
        }

        return view('pemilik_kos.laporan.addKamar.index', [
            "kos" => $kos // Kirimkan objek kos
        ]);
    }


    public function storeKamar(Request $request, $id_kos)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string|max:255',
        ]);

        // Simpan data kamar ke dalam database
        $kamar = new Kamar();
        $kamar->name = $validated['name'];
        $kamar->status = $validated['status'];
        $kamar->harga = $validated['harga'];
        $kamar->deskripsi = $validated['deskripsi'];
        $kamar->id_kos = $id_kos;
        $kamar->save();

        // Redirect atau tampilkan pesan sukses
        return back()->with('success', 'Kamar berhasil disimpan!');

    }
}
