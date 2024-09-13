<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {}

    public function proses_absensi(Request $request)
    {}

    public function dashboard() 
    {
        return view('pages.dashboard');
    }
}
