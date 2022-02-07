<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartModel;
use App\Models\Checkout;
use App\Models\CheckoutDetail;

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
            ->where("tb_keranjang.status", "t")
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
            ->where("tb_keranjang.status", "t")
            ->get();
        $count_barang = DB::table("tb_keranjang")
            ->where("id_user", Auth::user()->id)
            ->where("tb_keranjang.id_toko", $id)
            ->where("tb_keranjang.status", "t")
            ->count("id_barang");
        $count_love = DB::table("tb_wishlist")
            ->where("id_user", Auth::user()->id)
            ->count("id_barang");
        $sub_total = DB::table("tb_keranjang")
            ->where("id_user", Auth::user()->id)
            ->where("tb_keranjang.id_toko", $id)
            ->where("tb_keranjang.status", "t")
            ->sum("sub_harga");
        $ongkir = 0;
        $grand_total = $sub_total + $ongkir;

        $user = DB::table("user_detail")
            ->leftjoin("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
            ->leftjoin(
                "tb_kecamatan",
                "user_detail.id_kecamatan",
                "=",
                "tb_kecamatan.id_kecamatan"
            )
            ->leftjoin("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
            ->where("id_user", Auth::user()->id)
            ->where("status", "utama")
            ->get();

        $alamat_toko = DB::table("tb_toko")
            ->leftjoin("tb_kota", "tb_toko.kota", "=", "tb_kota.id_kota")
            ->leftjoin(
                "tb_kecamatan",
                "tb_toko.kecamatan",
                "=",
                "tb_kecamatan.id_kecamatan"
            )
            ->leftjoin("tb_desa", "tb_toko.desa", "=", "tb_desa.id_desa")
            ->where("id_toko", $id)
            ->get();

        $katlimit = DB::table("tb_kategori")
            ->limit(5)
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
            "katlimit" => $katlimit,
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

    public function proses_checkout(Request $request)
    {
        $checkout = Checkout::create([
            "id_user" => Auth::user()->id,
            "subtotal" => $request->subtotal,
            "ongkir" => $request->ongkir,
            "total" => $request->total,
            "tanggal" => date("Y-m-d"),
            "metode_pembayaran" => $request->metode_pembayaran,
        ]);

        $id_checkout = $checkout->id;

        $jumlah = $request->jumlah;

        for ($x = 0; $x < $jumlah; $x++) {
            CheckoutDetail::create([
                "id_checkout" => $id_checkout,
                "id_keranjang" => $request->id_keranjang[$x],
            ]);

            CartModel::where(
                "id_keranjang",
                $request->id_keranjang[$x]
            )->update(["status" => "c"]);
        }

        return redirect()->back();
    }
}
