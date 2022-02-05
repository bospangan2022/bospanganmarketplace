<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfilTokoController extends Controller
{
    public function index($id)
    {
        if (!Auth::check()) {
            $barang_toko = DB::table("tb_toko")
                ->join("tb_barang", "tb_toko.id_toko", "=", "tb_barang.id_toko")
                ->where("tb_toko.nama_toko", $id)
                ->get();

            $toko = DB::table("tb_toko")
                ->join("regencies", "tb_toko.kota", "=", "regencies.id")
                ->where("nama_toko", $id)
                ->get();

            $kat_toko = DB::table("tb_toko")
                ->join(
                    "tb_kategori",
                    "tb_toko.id_toko",
                    "=",
                    "tb_kategori.id_toko"
                )
                ->get();

            $j_kt = DB::table("tb_toko")
                ->join(
                    "tb_kategori",
                    "tb_toko.id_toko",
                    "=",
                    "tb_kategori.id_toko"
                )
                ->join(
                    "tb_barang",
                    "tb_barang.id_kategori",
                    "=",
                    "tb_barang.id_kategori"
                )
                ->where("tb_barang.id_barang", "tb_kategori.id_kategori")
                ->count();
            return view("marketplace.profil_toko", [
                "barang_toko" => $barang_toko,
                "toko" => $toko,
                "kat_toko" => $kat_toko,
                "j_kt" => $j_kt,
            ]);
        } else {
            $barang_toko = DB::table("tb_toko")
                ->join("tb_barang", "tb_toko.id_toko", "=", "tb_barang.id_toko")
                ->where("tb_toko.nama_toko", $id)
                ->get();

            $toko = DB::table("tb_toko")
                ->join("regencies", "tb_toko.kota", "=", "regencies.id")
                ->where("nama_toko", $id)
                ->get();

            $kat_toko = DB::table("tb_toko")
                ->join(
                    "tb_kategori",
                    "tb_toko.id_toko",
                    "=",
                    "tb_kategori.id_toko"
                )
                ->get();

            $j_kt = DB::table("tb_toko")
                ->join(
                    "tb_kategori",
                    "tb_toko.id_toko",
                    "=",
                    "tb_kategori.id_toko"
                )
                ->join(
                    "tb_barang",
                    "tb_barang.id_kategori",
                    "=",
                    "tb_barang.id_kategori"
                )
                ->where("tb_barang.id_barang", "tb_kategori.id_kategori")
                ->count();

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

            return view("marketplace.profil_toko", [
                "barang_toko" => $barang_toko,
                "toko" => $toko,
                "kat_toko" => $kat_toko,
                "j_kt" => $j_kt,
                "keranjang" => $keranjang,
                "count_barang" => $count_barang,
                "count_love" => $count_love,
                "sub_total" => $sub_total,

                // "toko" => $toko,
            ]);
        }
    }

    public function tanya_penjual()
    {
        $ct = DB::table("tb_toko")->get();

        foreach ($ct as $c) {
            $no_hp = $c->no_hp;
            $nama_toko = $c->nama_toko;
        }

        return redirect()->away(
            "https://api.whatsapp.com/send?phone=" .
                $no_hp .
                "&text=" .
                $nama_toko .
                ""
        );
    }
}
