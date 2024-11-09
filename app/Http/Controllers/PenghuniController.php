<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    public function index() {
        return view('penghuni.index');
    }
}
