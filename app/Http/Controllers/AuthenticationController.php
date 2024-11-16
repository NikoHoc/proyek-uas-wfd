<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthenticationController extends Controller
{
    public function login_form() {
        return view('authentication.login.index');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            $role = Auth::user()->role->nama;
            
            // Tentukan URL redirect sesuai role
            $redirectUrl = match ($role) {
                'admin' => route('admin.index'),
                'pemilik' => route('pemilik.index'),
                'penghuni' => route('penghuni.index'),
                default => route('authentication.login'),
            };
    
            // Simpan URL redirect ke session
            session(['redirectUrl' => $redirectUrl]);
    
            return redirect()
                ->route('authentication.login')
                ->with('success', 'Login berhasil!');
        }
    
        return back()->with('error', 'Username atau password salah.');
    }

    public function register_form() {
        $roles = DB::table('role')
               ->whereIn('id', [2, 3])
               ->get();
        return view('authentication.register.index', [
            'roles' => $roles
        ]);
    }

    public function add_user(Request $request) {
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
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'User registration failed']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();  // Logout user

        $request->session()->invalidate();  // Hapus session
        $request->session()->regenerateToken();  // Regenerasi CSRF token

        return redirect()->route('authentication.login')->with('success', 'Logout berhasil!');  // Redirect ke halaman login
    }
}
