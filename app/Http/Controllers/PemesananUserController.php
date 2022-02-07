<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemesananUserController extends Controller
{
    public function index()
    {
        return view("admin_toko.pemesanan");
    }

    public function pemesanan_detail()
    {
        return view("admin_toko.pemesanan_detail");
    }
}
