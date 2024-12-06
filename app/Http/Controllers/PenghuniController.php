<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Kos;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    // public function index() {
    //     return view('penghuni.index');
    // }

    public function showAllKos(){
        $listKos = Kos::with(['pengguna', 'kamar'])->withCount('kamar')->get();
        return view('penghuni.index', [
            "listKos" => $listKos
        ]);
    }

    public function showAllKamar() {
        $kosId = session()->get('kos_id'); // Jika Anda menggunakan session untuk menyimpan ID
            // Ambil data kos berdasarkan ID
        $kos = Kos::find($kosId);

        $listKamar = Kamar::query()->get();
        return view('penghuni.kos.index', [
            "listKamar" => $listKamar,
            "listKos" => $kos
        ]);
    }

    public function showPemesanan () {
        return view('penghuni.pemesanan.index');
    }
}
