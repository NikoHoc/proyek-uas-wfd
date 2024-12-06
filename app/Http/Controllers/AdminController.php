<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use App\Models\Pengguna;
use App\Models\Pesanan;
use App\Models\Review;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index () {

        $penghuni = Pengguna::query()->where('id_role', 3)->count();

        $kos = Kos::count();
        $pesanan = Pesanan::count();
        $custReview = Review::count();
      
        return view('admin.index', [
            'title' => 'Dashboard',
            'penghuni' => $penghuni,
            'kos' => $kos,
            'pesanan' => $pesanan,
            'custReview' => $custReview
        ]);
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

    public function formKos () {
        $pemilikBaru = Pengguna::where('id_role', 2)
            ->doesntHave('kos')
            ->get();

        return view('admin.form-pemilik.index', [
            'title' => 'Form Pemilik Kos',
            'pemilikBaru' => $pemilikBaru,
            
        ]);
    }

    public function addKos(Request $request) {
        $request->validate([
            'role' => 'required|exists:pengguna,id',
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        $result = DB::table('kos')->insert([
            'name' =>  $request->name,
            'alamat' => $request->alamat,
            'id_pengguna' => $request->role,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => 'Kos berhasil ditambahkan!',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui kos!',
            ]);
        }
    }

    public function formEditKos ($id) {
        $kos = Kos::with('pengguna')->find($id);
        
        return view('admin.form-pemilik.index', [
            'title' => 'Form Pemilik Kos',
            'kos' => $kos,
            
        ]);
    }

    public function editKos(Request $request, $id) {
        $request->validate([
            'role' => 'required|exists:pengguna,id',
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        $kos = Kos::findOrFail($id);

        if(!$kos) {
            return response()->json([
                'success' => false,
                'message' => 'Kos tidak ditemukan.',
            ]);
        }
        $kos->id_pengguna = $request->role;
        $kos->name = $request->name;
        $kos->alamat = $request->alamat; 
        $kos->updated_at = now();

        $result = $kos->save();
        if ($result) {
            return response()->json([
                'success' => true,
                'message' => 'Kos berhasil diperbarui!',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui kos!',
            ]);
        }
    }

    // show add user form
    public function formAddUsers () {
        $roles = DB::table('role')
               ->whereIn('id', [2, 3])
               ->get();
        return view('admin.form-users.index', [
            'title' => 'Form Add Users',
            'roles' => $roles
        ]);
    }

    public function addUsers (Request $request) {
        $request->validate([
            'role' => 'required',
            'username' => 'required',
            'password' => 'required|confirmed', 
        ]);

        $password = bcrypt($request->password);
        $result = DB::table('pengguna')->insert([
            'username' => $request->username,
            'password' => $password,
            'id_role' => $request->role,
            'created_at' => now(), 
            'updated_at' => now(), 
        ]);

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => 'User berhasil ditambahkan!',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan user.',
            ]);
        }
    }

    // show edit user form
    public function formEditUsers ($id) {
        $user = Pengguna::with('role')->find($id);
        return view('admin.form-users.index', [
            'title' => 'Form Edit Users',
            'user' => $user
        ]);
    }

    public function editUser (Request $request, $id) {
        $request->validate([
            'username' => 'required',
            'password' => 'nullable|confirmed',
        ]);
    
        $user = Pengguna::find($id);
    
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan.',
            ]);
        }
    
        $user->username = $request->username;
    
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->updated_at = now();
    
        $result = $user->save();
    
        if ($result) {
            return response()->json([
                'success' => true,
                'message' => 'User berhasil diperbarui!',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui user.',
            ]);
        }
    }

    public function deleteUser($id) {
        $user = Pengguna::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('admin.manage-users')->with('success', 'Data berhasil dihapus.');
        }
    
        return redirect()->route('admin.manage-users')->with('error', 'Data tidak ditemukan.');
    }

    public function deleteKos($id) {
        $kos = Kos::find($id);

        if ($kos) {
            $kos->delete();
            return redirect()->route('admin.manage-users')->with('success', 'Kos berhasil dihapus.');
        }
    
        return redirect()->route('admin.manage-users')->with('error', 'Kos tidak ditemukan.');
    }
}
