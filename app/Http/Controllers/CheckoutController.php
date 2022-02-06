<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartModel;

class CheckoutController extends Controller
{
    public function index($id)
    {
        $keranjang = DB::table("tb_keranjang")
            ->join(
                "tb_barang",
                "tb_keranjang.id_barang",
                "=",
                "tb_barang.id_barang"
            )
            ->where("id_user", Auth::user()->id)
            ->where("tb_keranjang.id_toko", $id)
            ->get();
        $checkout = DB::table("tb_keranjang")
            ->join(
                "tb_barang",
                "tb_keranjang.id_barang",
                "=",
                "tb_barang.id_barang"
            )
            ->where("id_user", Auth::user()->id)
            ->where("tb_keranjang.id_toko", $id)
            ->get();
        $count_barang = DB::table("tb_keranjang")
            ->where("id_user", Auth::user()->id)
            ->where("tb_keranjang.id_toko", $id)
            ->count("id_barang");
        $count_love = DB::table("tb_wishlist")
            ->where("id_user", Auth::user()->id)
            ->count("id_barang");
        $sub_total = DB::table("tb_keranjang")
            ->where("id_user", Auth::user()->id)
            ->where("tb_keranjang.id_toko", $id)
            ->sum("sub_harga");
        $ongkir = 0;
        $grand_total = $sub_total + $ongkir;

        $user = DB::table("user_detail")
            ->leftjoin(
                "regencies",
                "user_detail.id_regencies",
                "=",
                "regencies.id"
            )
            ->leftjoin(
                "districts",
                "user_detail.id_districts",
                "=",
                "districts.id"
            )
            ->leftjoin(
                "villages",
                "user_detail.id_villages",
                "=",
                "villages.id"
            )
            ->where("id_user", Auth::user()->id)
            ->where("status", "utama")
            ->get();

        $alamat_toko = DB::table("tb_toko")
            ->leftjoin("regencies", "tb_toko.kota", "=", "regencies.id")
            ->leftjoin("districts", "tb_toko.kecamatan", "=", "districts.id")
            ->leftjoin("villages", "tb_toko.desa", "=", "villages.id")
            ->where("id_toko", $id)
            ->get();

        //dd($alamat_toko);

        return view("marketplace.checkout", [
            "keranjang" => $keranjang,
            "count_barang" => $count_barang,
            "count_love" => $count_love,
            "sub_total" => $sub_total,
            "ongkir" => $ongkir,
            "grand_total" => $grand_total,
            "user" => $user,
            "checkout" => $checkout,
            "alamat_toko" => $alamat_toko,
        ]);
    }

    public function checkoutperitem(Request $request, $id)
    {
        $keranjang = DB::table("tb_keranjang")
            ->join(
                "tb_barang",
                "tb_keranjang.id_barang",
                "=",
                "tb_barang.id_barang"
            )
            ->where("id_user", Auth::user()->id)
            ->get();

        $proses = CartModel::create([
            "id_barang" => $id,
            "id_user" => Auth::user()->id,
            "jumlah" => $request->jumlah,
            "sub_harga" => $request->harga * $request->jumlah,
        ]);

        $checkout = DB::table("tb_keranjang")
            ->join(
                "tb_barang",
                "tb_keranjang.id_barang",
                "=",
                "tb_barang.id_barang"
            )
            ->where("id_user", Auth::user()->id)
            ->where("id_barang", $id)
            ->get();
        $count_barang = DB::table("tb_keranjang")
            ->where("id_user", Auth::user()->id)
            ->count("id_barang");
        $ongkir = 0;
        $grand_total = +$ongkir;

        $user = DB::table("user_detail")
            ->leftjoin(
                "regencies",
                "user_detail.id_regencies",
                "=",
                "regencies.id"
            )
            ->leftjoin(
                "districts",
                "user_detail.id_districts",
                "=",
                "districts.id"
            )
            ->leftjoin(
                "villages",
                "user_detail.id_villages",
                "=",
                "villages.id"
            )
            ->where("id_user", Auth::user()->id)
            ->where("status", "utama")
            ->get();

        // dd($user);

        return view("marketplace.checkout", [
            "keranjang" => $keranjang,
            "count_barang" => $count_barang,
            "ongkir" => $ongkir,
            "grand_total" => $grand_total,
            "user" => $user,
            "checkout" => $checkout,
            "proses" => $proses,
        ]);
    }
}
