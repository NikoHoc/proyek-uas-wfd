<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    public function index () {
        return view('admin.index', ['title' => 'Dashboard']);
    }

    public function manageUsers () {
        $usersData = Pengguna::with('role')->whereIn('id_role', [2, 3])->get();

        $kosData = Kos::with('pengguna', 'kamar', 'reviews')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'nama_kos' => $item->name,
                'alamat_kos' => $item->alamat,
                'jumlah_kamar' => $item->kamar->count(),
                'pemilik' => $item->pengguna->username,
                'total_review' => $item->reviews->count(),
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ];
        });

        $penghuniData = Pengguna::where('id_role', 3)->withCount(['pesanan', 'reviews'])->get();
        // $userData = Pengguna::query()->get();
        // $kosData = Kos::query()->get();
        return view('admin.manage-user.index', [
            'title' => 'Manage Users',
            'usersData' => $usersData,
            'kosData' => $kosData,
            'penghuniData' => $penghuniData
        ]);
    }

    public function formPemilik () {
        
        return view('admin.form-pemilik.index', [
            'title' => 'Form Pemilik Kos',
            
        ]);
    }

    public function formPenghuni () {
        return view('admin.form-penghuni.index', [
            'title' => 'Form Penghuni Kos'
        ]);
    }
}
