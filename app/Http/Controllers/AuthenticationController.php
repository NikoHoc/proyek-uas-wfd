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
}
