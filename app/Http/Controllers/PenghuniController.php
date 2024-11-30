<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Kos;
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
        $listKamar = Kamar::query()->get();
        return view('penghuni.kos.index', [
            "listKamar" => $listKamar
        ]);
    }
}
