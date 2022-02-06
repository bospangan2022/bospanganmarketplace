<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $barang = DB::table("tb_toko")
            ->join("tb_barang", "tb_toko.id_toko", "=", "tb_barang.id_toko")
            ->get();

        // dd($barang);

        $kategori = DB::table("tb_kategori")->get();
        $katlimit = DB::table("tb_kategori")
            ->limit(5)
            ->get();

        if (!Auth::check()) {
            return view(
                "marketplace.home",
                ["kategori" => $kategori, "katlimit" => $katlimit],
                ["barang" => $barang]
            );
        } else {
            $keranjang = DB::table("tb_keranjang")
                ->join(
                    "tb_barang",
                    "tb_keranjang.id_barang",
                    "=",
                    "tb_barang.id_barang"
                )
                ->where("id_user", Auth::user()->id)
                ->get();

            $count_barang = DB::table("tb_keranjang")
                ->where("id_user", Auth::user()->id)
                ->count("id_barang");
            $count_love = DB::table("tb_wishlist")
                ->where("id_user", Auth::user()->id)
                ->count("id_barang");
            $sub_total = DB::table("tb_keranjang")
                ->where("id_user", Auth::user()->id)
                ->sum("sub_harga");

            return view(
                "marketplace.home",
                ["kategori" => $kategori, "katlimit" => $katlimit],
                [
                    "barang" => $barang,
                    "keranjang" => $keranjang,
                    "count_barang" => $count_barang,
                    "count_love" => $count_love,
                    "sub_total" => $sub_total,
                ]
            );
        }
    }
}
