<?php

namespace App\Http\Controllers;

use App\Mail\BospanganEmail;
use App\Mail\UploadBukti;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartModel;
use App\Models\Checkout;
use App\Models\CheckoutDetail;
use Illuminate\Support\Facades\Mail;

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
            ->leftjoin("users", "user_detail.id_user", "=", "users.id")
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

        // dd($user);

        $alamat_toko = DB::table("tb_toko")
            ->leftjoin("tb_kota", "tb_toko.kota", "=", "tb_kota.id_kota")
            ->leftjoin("users", "tb_toko.id_user", "=", "users.id")
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

        // dd($user);

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

        $nama_barang = $request->nama_barang;
        $harga = $request->harga;
        $jumlah = $request->jumlah;
        $sub = $request->harga * $request->jumlah;
        $id_toko = $id;
        $id_barang = $request->id_barang;
        return view("marketplace.checkoutlangsung", [
            "nama_barang" => $nama_barang,
            "harga" => $harga,
            "jumlah" => $jumlah,
            "sub" => $sub,
            "id_toko" => $id_toko,
            "id_barang" => $id_barang,
            "user" => $user,
            "alamat_toko" => $alamat_toko,
            "katlimit" => $katlimit,
            "keranjang" => $keranjang,
            "count_barang" => $count_barang,
            "count_love" => $count_love,
            "sub_total" => $sub_total,
        ]);
    }

    public function checkoutlangsung(Request $request)
    {
        $keranjang = CartModel::create([
            "id_user" => Auth::user()->id,
            "id_barang" => $request->id_barang,
            "id_toko" => $request->id_toko,
            "jumlah" => $request->jumlah,
            "sub_harga" => $request->subtotal,
            "status" => "c",
        ]);

        $id_keranjang = $keranjang->id;

        $checkout = Checkout::create([
            "id_user" => Auth::user()->id,
            "id_toko" => $request->id_toko,
            "subtotal" => $request->subtotal,
            "ongkir" => $request->ongkir,
            "total" => $request->total,
            "tanggal" => date("Y-m-d"),
            "metode_pembayaran" => $request->metode_pembayaran,
        ]);

        $id_checkout = $checkout->id;

        CheckoutDetail::create([
            "id_checkout" => $id_checkout,
            "id_keranjang" => $id_keranjang,
        ]);

        if ($request->metode_pembayaran == "cod") {
            return redirect()->route("aftercheckout_cod", $id_checkout);
        } else {
            return redirect()->route("aftercheckout_tf", $id_checkout);
        }
    }

    public function proses_checkout(Request $request)
    {
        if ($request->metode_pembayaran == "cod") {
            $checkout = Checkout::create([
                "id_user" => Auth::user()->id,
                "id_toko" => $request->id_toko,
                "subtotal" => $request->subtotal,
                "ongkir" => $request->ongkir,
                "total" => $request->total,
                "tanggal" => date("Y-m-d"),
                "metode_pembayaran" => $request->metode_pembayaran,
            ]);
        } else {
            $checkout = Checkout::create([
                "id_user" => Auth::user()->id,
                "id_toko" => $request->id_toko,
                "subtotal" => $request->subtotal,
                "ongkir" => $request->ongkir,
                "total" => $request->total,
                "tanggal" => date("Y-m-d"),
                "metode_pembayaran" => $request->metode_pembayaran,
            ]);
        }

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

        Mail::to($request->email)->send(new BospanganEmail());

        if ($request->metode_pembayaran == "cod") {
            return redirect()->route("aftercheckout_cod", $id_checkout);
        } else {
            return redirect()->route("aftercheckout_tf", $id_checkout);
        }
    }

    public function aftercheckout_tf($id)
    {
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
        $checkout = DB::table("tb_keranjang")
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
        $ongkir = 0;
        $grand_total = $sub_total + $ongkir;

        $katlimit = DB::table("tb_kategori")
            ->limit(5)
            ->get();

        //dd($alamat_toko);

        $pesanan = DB::table("tb_checkout")
            ->join("tb_toko", "tb_checkout.id_toko", "=", "tb_toko.id_toko")
            ->join("users", "tb_toko.id_user", "=", "users.id")
            ->where("tb_checkout.id_user", Auth::user()->id)
            ->where("tb_checkout.id_checkout", $id)
            ->get();
        //dd($pesanan);

        return view("marketplace.aftercheckout_tf", [
            "keranjang" => $keranjang,
            "count_barang" => $count_barang,
            "count_love" => $count_love,
            "sub_total" => $sub_total,
            "ongkir" => $ongkir,
            "grand_total" => $grand_total,
            "checkout" => $checkout,
            "katlimit" => $katlimit,
            "pesanan" => $pesanan,
        ]);
    }

    public function upload_bukti(Request $request, $id)
    {
        $messages = [
            "required" => "Upload Bukti Terlebih Dahulu",
            "image" => "File Harus Berupa Gambar",
            "mimes" => "Format Gambar Salah",
            "max" => "Ukuran Gambar Harus Kurang Dari 2MB",
        ];

        $request->validate(
            [
                "bukti" => "required|image|mimes:jpeg,png,jpg|max:2048",
            ],
            $messages
        );

        $image = $request->file("bukti");
        $name = rand(1000, 9999) . "." . $image->getClientOriginalExtension();
        $image->move("images/post", $name);

        Checkout::where("id_checkout", $id)->update([
            "bukti" => $name,
            "status" => "dikemas",
        ]);

        Mail::to($request->email)->send(new UploadBukti());

        return redirect()->route("home");
    }

    public function aftercheckout_cod($id)
    {
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
        $checkout = DB::table("tb_keranjang")
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

        // dd($user);

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

        $pesanan = DB::table("tb_checkout")
            ->join("tb_toko", "tb_checkout.id_toko", "=", "tb_toko.id_toko")
            ->where("tb_checkout.id_user", Auth::user()->id)
            ->where("tb_checkout.id_checkout", $id)
            ->get();

        return view("marketplace.aftercheckout_cod", [
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
            "pesanan" => $pesanan,
        ]);
    }

    public function batalkanpesanan($id)
    {
        Checkout::where("id_checkout", $id)->update([
            "status" => "dibatalkan",
        ]);

        return redirect()->back();
    }
}
