<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilTokoController extends Controller
{
    public function index()
    {
        $barang_toko = DB::table("tb_barang")
            ->join("tb_toko", "tb_barang.id_toko", "=", "tb_toko.id_toko")
            ->get();

        // dd($barang_toko);

        $kat_toko = DB::table("tb_kategori")
            ->join("tb_toko", "tb_kategori.id_toko", "=", "tb_toko.id_toko")
            ->get();

        return view("marketplace.profil_toko", [
            "barang_toko" => $barang_toko,
            "kat_toko" => $kat_toko,
        ]);
    }
}
