<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = DB::table("users")
            ->where("role", "pelanggan")
            ->get();
        return view("admin.pelanggan", ["pelanggan" => $pelanggan]);
    }
}
