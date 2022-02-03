<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        return view('admin.pemesanan');
    }

    public function pemesanan_detail()
    {
        return view('admin.pemesanan_detail');
    }
    
}