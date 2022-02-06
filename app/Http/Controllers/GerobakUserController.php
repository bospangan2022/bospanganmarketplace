<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class GerobakUserController extends Controller
{
    public function index()
    {
        $keranjang = DB::table("users")
            ->join("user_detail", "users.id", "=", "user_detail.id_user")
            ->get();
        $toko = DB::table("tb_toko")
            ->where("id_user", Auth::user()->id)
            ->get();
        foreach ($toko as $t) {
            $id_toko = $t->id_toko;
        }
        $page = DB::table("tb_keranjang")
            ->join(
                "tb_barang",
                "tb_keranjang.id_barang",
                "=",
                "tb_barang.id_barang"
            )
            ->where("tb_keranjang.id_toko", $id_toko)
            ->where("tb_keranjang.status", "t")
            ->paginate(3);

        $total_keranjang = DB::table("tb_keranjang")
            ->join(
                "tb_barang",
                "tb_keranjang.id_barang",
                "=",
                "tb_barang.id_barang"
            )
            ->where("tb_keranjang.id_toko", $id_toko)
            ->where("tb_keranjang.status", "t")
            ->count();

        $total_dana = DB::table("tb_keranjang")
            ->join(
                "tb_barang",
                "tb_keranjang.id_barang",
                "=",
                "tb_barang.id_barang"
            )
            ->where("tb_keranjang.id_toko", $id_toko)
            ->where("tb_keranjang.status", "t")
            ->sum("sub_harga");

        // dd($keranjang);

        return view("admin_toko.gerobak", [
            "keranjang" => $keranjang,
            "total_keranjang" => $total_keranjang,
            "total_dana" => $total_dana,
            "page" => $page,
        ]);
    }

    public function cari_gerobak(Request $request)
    {
        $keyword = $request->cari;

        $keranjang = DB::table("users")
            ->join("user_detail", "users.id", "=", "user_detail.id_user")
            ->get();

        $toko = DB::table("tb_toko")
            ->where("id_user", Auth::user()->id)
            ->get();
        foreach ($toko as $t) {
            $id_toko = $t->id_toko;
        }

        $search = DB::table("users")
            ->join("user_detail", "users.id", "=", "user_detail.id_user")
            ->orWhere("name", "LIKE", "%{$keyword}%")
            ->get();

        // dd($search);

        $total_keranjang = DB::table("tb_keranjang")
            ->join(
                "tb_barang",
                "tb_keranjang.id_barang",
                "=",
                "tb_barang.id_barang"
            )
            ->where("tb_keranjang.id_toko", $id_toko)
            ->where("tb_keranjang.status", "t")
            ->count();

        $total_dana = DB::table("tb_keranjang")
            ->join(
                "tb_barang",
                "tb_keranjang.id_barang",
                "=",
                "tb_barang.id_barang"
            )
            ->where("tb_keranjang.id_toko", $id_toko)
            ->where("tb_keranjang.status", "t")
            ->sum("sub_harga");

        return view("admin_toko.cari_gerobak", [
            "keranjang" => $keranjang,
            "total_keranjang" => $total_keranjang,
            "total_dana" => $total_dana,
            "keyword" => $keyword,
            "search" => $search,
        ]);
    }
}
