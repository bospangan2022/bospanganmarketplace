<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Checkout;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index($id)
    {
        $checkout = DB::table("tb_checkout")
            ->where("id_checkout", $id)
            ->get();
        $user = DB::table("tb_checkout")
            ->join("users", "tb_checkout.id_checkout", "=", "users.id")
            ->where("id_checkout", $id)
            ->get();
        foreach ($user as $us) {
            $user_detail = DB::table("user_detail")
                ->join("users", "user_detail.id_user", "=", "users.id")
                ->where("id_user", $us->id_user)
                ->get();
        }
        foreach ($checkout as $co) {
            $detail_co = DB::table("tb_detail_checkout")
                ->join(
                    "tb_keranjang",
                    "tb_detail_checkout.id_keranjang",
                    "=",
                    "tb_keranjang.id_keranjang"
                )
                ->where("id_checkout", $co->id_checkout)
                ->get();
        }
        foreach ($detail_co as $dc) {
            $order = DB::table("tb_keranjang")
                ->join(
                    "tb_barang",
                    "tb_keranjang.id_barang",
                    "=",
                    "tb_barang.id_barang"
                )
                ->where("id_keranjang", $dc->id_keranjang)
                ->get();

            $total_belanja = DB::table("tb_keranjang")
                ->where("id_keranjang", $dc->id_keranjang)
                ->sum("sub_harga");
        }

        $ongkir = 0;
        $grand_total = $total_belanja + $ongkir;

        $toko = DB::table("tb_checkout")
            ->join("tb_toko", "tb_checkout.id_toko", "=", "tb_toko.id_toko")
            ->where("id_checkout", $id)
            ->get();
        foreach ($toko as $t) {
            $alamat = DB::table("tb_toko")
                ->leftjoin("tb_kota", "tb_toko.kota", "=", "tb_kota.id_kota")
                ->leftjoin(
                    "tb_kecamatan",
                    "tb_toko.kecamatan",
                    "=",
                    "tb_kecamatan.id_kecamatan"
                )
                ->leftjoin("tb_desa", "tb_toko.desa", "=", "tb_desa.id_desa")
                ->where("id_toko", $t->id_toko)
                ->get();
        }
        foreach ($user_detail as $u) {
            $delivery = DB::table("user_detail")
                ->leftjoin(
                    "tb_kota",
                    "user_detail.id_kota",
                    "=",
                    "tb_kota.id_kota"
                )
                ->leftjoin(
                    "tb_kecamatan",
                    "user_detail.id_kecamatan",
                    "=",
                    "tb_kecamatan.id_kecamatan"
                )
                ->leftjoin(
                    "tb_desa",
                    "user_detail.id_desa",
                    "=",
                    "tb_desa.id_desa"
                )
                ->where("id_user_detail", $u->id_user_detail)
                ->get();
        }

        return view("marketplace.invoice", [
            "checkout" => $checkout,
            "user" => $user,
            "alamat" => $alamat,
            "toko" => $toko,
            "delivery" => $delivery,
            "order" => $order,
            "total_belanja" => $total_belanja,
            "grand_total" => $grand_total,
            "ongkir" => $ongkir,
        ]);
    }
}
