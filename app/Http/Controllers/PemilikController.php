<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;

class PemilikController extends Controller
{
    // public function index()
    // {
    //     return view('pemilik_kos.index');
    // }

    public function showKos()
    {
        // Mengambil data kos berdasarkan id pengguna 4
        $kos = Kos::query()
            ->where('id_pengguna', 4) // Sesuaikan nama kolom 'user_id' dengan skema database Anda
            ->get();

        // Kirim data ke view
        return view('pemilik_kos.index', [
            "kos" => $kos
        ]);
    }


    public function indexRequest()
    {
        // Mengambil data kos berdasarkan id pengguna 4
        $kos = Kos::query()
            ->where('id_pengguna', 4) // Sesuaikan nama kolom 'user_id' dengan skema database Anda
            ->get();

        return view('pemilik_kos.request.index', [
            "kos" => $kos
        ]);
    }

    public function indexLaporan()
    {
        // Mengambil data kos berdasarkan id pengguna 4
        $kos = Kos::query()
            ->where('id_pengguna', 4) // Sesuaikan nama kolom 'user_id' dengan skema database Anda
            ->get();

        return view('pemilik_kos.laporan.index', [
            "kos" => $kos
        ]);
    }

    public function addKamar()
    {
        // Mengambil data kos berdasarkan id pengguna 4
        $kos = Kos::query()
            ->where('id_pengguna', 4) // Sesuaikan nama kolom 'user_id' dengan skema database Anda
            ->get();

        return view('pemilik_kos.laporan.addKamar.index', [
            "kos" => $kos
        ]);
    }
}
