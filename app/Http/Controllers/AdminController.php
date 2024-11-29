<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index () {
        return view('admin.index', ['title' => 'Dashboard']);
    }

    public function manage_users () {
        $usersData = Pengguna::with('role')->whereIn('id_role', [2, 3])->get();

        $kosData = Kos::with('pengguna', 'kamar', 'reviews')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'nama_kos' => $item->name,
                'password' => $item->pengguna->password,
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
        return view('admin.manage_user.index', [
            'title' => 'Manage Users',
            'usersData' => $usersData,
            'kosData' => $kosData,
            'penghuniData' => $penghuniData
        ]);
    }

    public function manage_kos () {
        
        return view('admin.manage_kos.index', [
            'title' => 'Manage Kos',
            
        ]);
    }

    public function form () {
        return view('admin.form.index', ['title' => 'Form']);
    }
}
