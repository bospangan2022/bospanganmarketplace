<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index()
    {
        $katlimit = DB::table("tb_kategori")
            ->limit(5)
            ->get();

        if (!Auth::check()) {
            return view("marketplace.aboutus", ["katlimit" => $katlimit]);
        } else {
            $keranjang = DB::table("tb_keranjang")
                ->join(
                    "tb_barang",
                    "tb_keranjang.id_barang",
                    "=",
                    "tb_barang.id_barang"
                )
                ->where("id_user", Auth::user()->id)
                ->where("tb_keranjang.status", "t")
                ->get();

            $count_barang = DB::table("tb_keranjang")
                ->where("id_user", Auth::user()->id)
                ->where("tb_keranjang.status", "t")
                ->count("id_barang");
            $count_love = DB::table("tb_wishlist")
                ->where("id_user", Auth::user()->id)
                ->count("id_barang");
            $sub_total = DB::table("tb_keranjang")
                ->where("id_user", Auth::user()->id)
                ->where("tb_keranjang.status", "t")
                ->sum("sub_harga");

            return view("marketplace.aboutus", [
                "count_barang" => $count_barang,
                "count_love" => $count_love,
                "keranjang" => $keranjang,
                "sub_total" => $sub_total,
                "katlimit" => $katlimit,
            ]);
        }
    }
}
