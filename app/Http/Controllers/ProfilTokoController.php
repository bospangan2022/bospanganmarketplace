<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfilTokoController extends Controller
{
    public function index($id)
    {
        $toko = DB::table("tb_toko")
            ->join("tb_kota", "tb_toko.kota", "=", "tb_kota.id_kota")
            ->where("nama_toko", $id)
            ->get();

        // dd($toko);

        $barang_toko = DB::table("tb_toko")
            ->join("tb_barang", "tb_toko.id_toko", "=", "tb_barang.id_toko")
            ->get();

        $count = $barang_toko->count();

        // dd($barang_toko);

        $kat_toko = DB::table("tb_toko")
            ->join("tb_kategori", "tb_toko.id_toko", "=", "tb_kategori.id_toko")
            ->get();

        $katlimit = DB::table("tb_kategori")
            ->limit(5)
            ->get();

        // dd($j_kt);

        if (!Auth::check()) {
            return view("marketplace.profil_toko", [
                "toko" => $toko,
                "barang_toko" => $barang_toko,
                "kat_toko" => $kat_toko,
                "count" => $count,
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

            return view("marketplace.profil_toko", [
                "barang_toko" => $barang_toko,
                "kat_toko" => $kat_toko,
                "keranjang" => $keranjang,
                "count_barang" => $count_barang,
                "count_love" => $count_love,
                "sub_total" => $sub_total,
                "toko" => $toko,
                "count" => $count,
                "katlimit" => $katlimit,
            ]);
        }
    }

    public function tanya_penjual()
    {
        $ct = DB::table("tb_toko")->get();

        foreach ($ct as $c) {
            $no_hp = $c->hp_toko;
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

    public function barangtoko_kat($id)
    {
        $mix = DB::table("tb_kategori")
            ->where("id_kategori", $id)
            ->get();

        foreach ($mix as $m) {
            $id_toko = $m->id_toko;
        }

        $toko = DB::table("tb_toko")
            ->join("regencies", "tb_toko.kota", "=", "regencies.id")
            ->where("id_toko", $id_toko)
            ->get();

        // dd($toko);

        $kat_toko = DB::table("tb_toko")
            ->join("tb_kategori", "tb_toko.id_toko", "=", "tb_kategori.id_toko")
            ->get();

        $katlimit = DB::table("tb_kategori")
            ->limit(5)
            ->get();

        $barang_kat = DB::table("tb_toko")
            ->join("tb_barang", "tb_toko.id_toko", "=", "tb_barang.id_toko")
            ->where("id_kategori", $id)
            ->get();

        $count = $barang_kat->count();

        if (!Auth::check()) {
            return view("marketplace.barangtoko_kat", [
                "toko" => $toko,
                "barang_kat" => $barang_kat,
                "kat_toko" => $kat_toko,
                "count" => $count,
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

            return view("marketplace.barangtoko_kat", [
                "barang_kat" => $barang_kat,
                "kat_toko" => $kat_toko,
                "keranjang" => $keranjang,
                "count_barang" => $count_barang,
                "count_love" => $count_love,
                "sub_total" => $sub_total,
                "toko" => $toko,
                "count" => $count,
                "katlimit" => $katlimit,
            ]);
        }
    }

    public function search(Request $request)
    {
        // $toko = DB::table("tb_toko")
        //     ->join("regencies", "tb_toko.kota", "=", "regencies.id")
        //     ->where("nama_toko", $id)
        //     ->get();

        $keyword = $request->cari;
        $kat_toko = DB::table("tb_toko")
            ->join("tb_kategori", "tb_toko.id_toko", "=", "tb_kategori.id_toko")
            ->get();

        $katlimit = DB::table("tb_kategori")
            ->limit(5)
            ->get();

        $search = DB::table("tb_toko")
            ->join("tb_barang", "tb_toko.id_toko", "=", "tb_barang.id_toko")
            ->orWhere("nama_barang", "LIKE", "%{$keyword}%")
            ->get();

        $count = $search->count();

        if (!Auth::check()) {
            return view("marketplace.barangtoko_search", [
                "search" => $search,
                "kat_toko" => $kat_toko,
                "count" => $count,
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

            return view("marketplace.barangtoko_search", [
                "search" => $search,
                "kat_toko" => $kat_toko,
                "keranjang" => $keranjang,
                "count_barang" => $count_barang,
                "count_love" => $count_love,
                "sub_total" => $sub_total,
                "count" => $count,
                "katlimit" => $katlimit,
            ]);
        }
    }
}
