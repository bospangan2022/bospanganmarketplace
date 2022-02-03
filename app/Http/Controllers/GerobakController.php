<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GerobakController extends Controller
{
    public function index()
    {
        $keranjang = DB::table("users")
            ->join("user_detail", "users.id", "=", "user_detail.id_user")
            ->get();

        $page = DB::table("tb_keranjang")
            ->join(
                "tb_barang",
                "tb_keranjang.id_barang",
                "=",
                "tb_barang.id_barang"
            )
            ->where("status", "t")
            ->paginate(3);

        $total_keranjang = DB::table("users")
            ->join("user_detail", "users.id", "=", "user_detail.id_user")
            ->count();

        $total_dana = DB::table("tb_keranjang")
            ->join(
                "tb_barang",
                "tb_keranjang.id_barang",
                "=",
                "tb_barang.id_barang"
            )
            ->where("status", "t")
            ->sum("sub_harga");

        // dd($keranjang);

        return view("admin.gerobak", [
            "keranjang" => $keranjang,
            "total_keranjang" => $total_keranjang,
            "total_dana" => $total_dana,
            "page" => $page,
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $hapus = DB::table("tb_keranjang")
            ->join(
                "tb_barang",
                "tb_keranjang.id_barang",
                "=",
                "tb_barang.id_barang"
            )
            ->where("id_user", $request->id_user)
            ->where("id_keranjang", $id)
            ->where("status", "t")
            ->delete();

        return redirect()->back();
    }

    public function cari_gerobak(Request $request)
    {
        $keyword = $request->cari;

        $keranjang = DB::table("users")
            ->join("user_detail", "users.id", "=", "user_detail.id_user")
            ->get();

        $search = DB::table("users")
            ->join("user_detail", "users.id", "=", "user_detail.id_user")
            ->orWhere("name", "LIKE", "%{$keyword}%")
            ->get();

        // dd($search);

        $total_keranjang = DB::table("users")
            ->join("user_detail", "users.id", "=", "user_detail.id_user")
            ->count();

        $total_dana = DB::table("tb_keranjang")
            ->join(
                "tb_barang",
                "tb_keranjang.id_barang",
                "=",
                "tb_barang.id_barang"
            )
            ->where("status", "t")
            ->sum("sub_harga");

        return view("admin.cari_gerobak", [
            "keranjang" => $keranjang,
            "total_keranjang" => $total_keranjang,
            "total_dana" => $total_dana,
            "keyword" => $keyword,
            "search" => $search,
        ]);
    }
}
