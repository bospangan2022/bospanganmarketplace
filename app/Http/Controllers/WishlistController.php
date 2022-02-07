<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = DB::table("tb_wishlist")
            ->join(
                "tb_barang",
                "tb_wishlist.id_barang",
                "=",
                "tb_barang.id_barang"
            )
            ->join("tb_toko", "tb_wishlist.id_toko", "=", "tb_toko.id_toko")
            ->where("tb_wishlist.id_user", Auth::user()->id)
            ->get();

        $katlimit = DB::table("tb_kategori")
            ->limit(5)
            ->get();

        // dd($wishlist);

        if (!Auth::check()) {
            return view("marketplace.wishlist", [
                "wishlist" => $wishlist,
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
                ->count();
            $count_love = DB::table("tb_wishlist")
                ->where("id_user", Auth::user()->id)
                ->count();
            $sub_total = DB::table("tb_keranjang")
                ->where("id_user", Auth::user()->id)
                ->where("tb_keranjang.status", "t")
                ->sum("sub_harga");

            return view("marketplace.wishlist", [
                "wishlist" => $wishlist,
                "keranjang" => $keranjang,
                "count_barang" => $count_barang,
                "count_love" => $count_love,
                "sub_total" => $sub_total,
                "katlimit" => $katlimit,
            ]);
        }
    }

    public function add_wishlist(Request $request)
    {
        $check = DB::table("tb_wishlist")
            ->where("id_barang", $request->id_barang)
            ->where("id_user", Auth::user()->id)
            ->count();
        if ($check == 0) {
            Wishlist::create([
                "id_user" => Auth::user()->id,
                "id_barang" => $request->id_barang,
                "id_toko" => $request->id_toko,
            ]);
        } else {
            $wishlist = DB::table("tb_wishlist")
                ->where("id_barang", $request->id_barang)
                ->where("id_user", Auth::user()->id)
                ->get();
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $wishlist = DB::table("tb_wishlist")
            ->where("id_wishlist", $id)
            ->delete();

        return redirect()->back();
    }
}
