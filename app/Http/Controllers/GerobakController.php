<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            ->where("tb_keranjang.status", "t")
            ->paginate(3);

        $toko = DB::table("tb_toko")
            ->where("id_user", Auth::user()->id)
            ->get();

        foreach ($toko as $t) {
            $total_keranjang = DB::table("users")
                ->join("tb_toko", "users.id", "=", "tb_toko.id_user")
                ->join(
                    "tb_keranjang",
                    "tb_toko.id_toko",
                    "=",
                    "tb_keranjang.id_toko"
                )
                ->where("tb_keranjang.status", "t")
                ->where("tb_keranjang.id_toko", $t->id_toko)
                ->count();

            // dd($total_keranjang);
        }

        $total_dana = DB::table("tb_keranjang")
            ->join(
                "tb_barang",
                "tb_keranjang.id_barang",
                "=",
                "tb_barang.id_barang"
            )
            ->where("tb_keranjang.status", "t")
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
            ->where("tb_keranjang.status", "t")
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
            ->where("tb_keranjang.status", "t")
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
