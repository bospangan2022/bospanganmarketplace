<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BelanjaController extends Controller
{
    public function index()
    {
        $jumlah = DB::table("tb_barang")->count();
        // dd($jumlah);
        $barang = DB::table("tb_toko")
            ->join("tb_barang", "tb_toko.id_toko", "=", "tb_barang.id_toko")
            ->get();

        $toko = DB::table("tb_toko")->get();
        $kat = DB::table("tb_kategori")->get();
        $katlimit = DB::table("tb_kategori")
            ->limit(5)
            ->get();

        if (!Auth::check()) {
            return view("marketplace.belanja", [
                "barang" => $barang,
                "kat" => $kat,
                "jumlah" => $jumlah,
                "toko" => $toko,
                "katlimit" => $katlimit,
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
            return view("marketplace.belanja", [
                "barang" => $barang,
                "kat" => $kat,
                "jumlah" => $jumlah,
                "keranjang" => $keranjang,
                "count_barang" => $count_barang,
                "count_love" => $count_love,
                "sub_total" => $sub_total,
                "toko" => $toko,
                "katlimit" => $katlimit,
            ]);
        }
    }

    public function barang_kat($id)
    {
        $kategori = DB::table("tb_kategori")
            ->where("id_kategori", $id)
            ->get();
        $kat = DB::table("tb_kategori")->get();
        $katlimit = DB::table("tb_kategori")
            ->limit(5)
            ->get();

        $barang_kat = DB::table("tb_toko")
            ->join("tb_barang", "tb_toko.id_toko", "=", "tb_barang.id_toko")
            ->where("id_kategori", $id)
            ->get();

        // dd($barang_kat);

        $jumlah = $barang_kat->count();
        if (!Auth::check()) {
            return view("marketplace.belanja_kat", [
                "barang_kat" => $barang_kat,
                "kategori" => $kategori,
                "kat" => $kat,
                "jumlah" => $jumlah,
                "katlimit" => $katlimit,
            ]);
        } else {
            $count_barang = DB::table("tb_keranjang")
                ->where("id_user", Auth::user()->id)
                ->count("id_barang");
            $count_love = DB::table("tb_wishlist")
                ->where("id_user", Auth::user()->id)
                ->count("id_barang");
            $sub_total = DB::table("tb_keranjang")
                ->where("id_user", Auth::user()->id)
                ->sum("sub_harga");
            $keranjang = DB::table("tb_keranjang")
                ->join(
                    "tb_barang",
                    "tb_keranjang.id_barang",
                    "=",
                    "tb_barang.id_barang"
                )
                ->where("id_user", Auth::user()->id)
                ->get();
            return view("marketplace.belanja_kat", [
                "barang_kat" => $barang_kat,
                "kategori" => $kategori,
                "kat" => $kat,
                "jumlah" => $jumlah,
                "count_barang" => $count_barang,
                "count_love" => $count_love,
                "keranjang" => $keranjang,
                "sub_total" => $sub_total,
                "katlimit" => $katlimit,
            ]);
        }
    }

    public function search(Request $request)
    {
        $keyword = $request->cari;
        $kat = DB::table("tb_kategori")->get();
        $search = DB::table("tb_toko")
            ->join("tb_barang", "tb_toko.id_toko", "=", "tb_barang.id_toko")
            ->orWhere("nama_barang", "LIKE", "%{$keyword}%")
            ->get();
        $jumlah = $search->count();

        $katlimit = DB::table("tb_kategori")
            ->limit(5)
            ->get();
        // dd($search);

        if (!Auth::check()) {
            return view("marketplace.search", [
                "kat" => $kat,
                "search" => $search,
                "keyword" => $keyword,
                "jumlah" => $jumlah,
                "katlimit" => $katlimit,
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

            $count_love = DB::table("tb_wishlist")
                ->where("id_user", Auth::user()->id)
                ->count("id_barang");
            $count_barang = DB::table("tb_keranjang")
                ->where("id_user", Auth::user()->id)
                ->count("id_barang");
            $sub_total = DB::table("tb_keranjang")
                ->where("id_user", Auth::user()->id)
                ->sum("sub_harga");

            return view("marketplace.search", [
                "kat" => $kat,
                "keranjang" => $keranjang,
                "count_barang" => $count_barang,
                "count_love" => $count_love,
                "sub_total" => $sub_total,
                "search" => $search,
                "keyword" => $keyword,
                "jumlah" => $jumlah,
                "katlimit" => $katlimit,
            ]);
        }
    }
}
