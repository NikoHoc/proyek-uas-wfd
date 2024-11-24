<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index () {
        return view('admin.index', ['title' => 'Dashboard']);
    }

    public function manage_users () {
        return view('admin.manage_user.index', ['title' => 'Manage Users']);
    }

    public function manage_kos () {
        return view('admin.manage_kos.index', ['title' => 'Manage Kos']);
    }

    public function form () {
        return view('admin.form.index', ['title' => 'Form']);
    }
}
