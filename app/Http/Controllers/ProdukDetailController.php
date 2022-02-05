<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProdukDetailController extends Controller
{
    public function index($id)
    {
        $barang = DB::table("tb_barang")->get();
        // $barang_id = DB::table('tb_barang')->where('id_barang', $id)->get();
        $barang_kat = DB::table("tb_toko")
            ->join("tb_barang", "tb_toko.id_toko", "=", "tb_barang.id_toko")
            ->join(
                "tb_kategori",
                "tb_barang.id_kategori",
                "=",
                "tb_kategori.id_kategori"
            )
            ->select(
                "tb_barang.*",
                "tb_toko.nama_toko",
                "tb_kategori.nama_kategori"
            )
            ->where("id_barang", $id)
            ->get();

        // dd($barang_kat);

        if (!Auth::check()) {
            return view("marketplace.produk_detail", [
                "barang" => $barang,
                "barang_kat" => $barang_kat,
            ]);
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

            return view("marketplace.produk_detail", [
                "barang" => $barang,
                "barang_kat" => $barang_kat,
                "keranjang" => $keranjang,
                "count_barang" => $count_barang,
                "count_love" => $count_love,
                "sub_total" => $sub_total,
            ]);
        }
    }
}
