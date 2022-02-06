<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartModel;
use App\Models\District;
use App\Models\Village;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $toko = DB::table("tb_keranjang")
            ->join("tb_toko", "tb_keranjang.id_toko", "=", "tb_toko.id_toko")
            ->select("tb_toko.id_toko", "tb_toko.nama_toko")
            ->where("tb_keranjang.id_user", Auth::user()->id)
            ->where("tb_keranjang.status", "t")
            ->distinct("id_toko")
            ->get();
        //dd($toko);
        $keranjang = DB::table("tb_toko")
            ->join("tb_barang", "tb_toko.id_toko", "=", "tb_barang.id_toko")
            ->join(
                "tb_keranjang",
                "tb_barang.id_barang",
                "=",
                "tb_keranjang.id_barang"
            )
            ->where("tb_keranjang.id_user", Auth::user()->id)
            ->where("tb_keranjang.status", "t")
            ->orderBy("tb_toko.id_toko", "ASC")
            ->get();
        //dd($keranjang);

        $sub_total = DB::table("tb_keranjang")
            ->where("id_user", Auth::user()->id)
            ->sum("sub_harga");
        $ppn = $sub_total * 0.1;
        $ongkir = 0;
        $grand_total = $sub_total + $ongkir;
        $count_barang = DB::table("tb_keranjang")
            ->where("id_user", Auth::user()->id)
            ->count("id_barang");
        $count_love = DB::table("tb_wishlist")
            ->where("id_user", Auth::user()->id)
            ->count("id_barang");

        $kota = DB::table("tb_kota")
            ->reorder("nama_kota", "asc")
            ->get();

        $katlimit = DB::table("tb_kategori")
            ->limit(5)
            ->get();

        return view("marketplace.cart", [
            "keranjang" => $keranjang,
            "toko" => $toko,
            "sub_total" => $sub_total,
            "ppn" => $ppn,
            "ongkir" => $ongkir,
            "grand_total" => $grand_total,
            "count_barang" => $count_barang,
            "count_love" => $count_love,
            "kota" => $kota,
            "katlimit" => $katlimit,
        ]);
    }

    public function getKec(Request $request)
    {
        $kecamatan = District::where("id_kota", $request->id_kota)
            ->reorder("nama_kecamatan", "asc")
            ->pluck("id_kecamatan", "nama_kecamatan");
        return response()->json($kecamatan);
    }

    public function getDesa(Request $request)
    {
        $desa = Village::where("id_kecamatan", $request->id_kecamatan)
            ->reorder("nama_desa", "asc")
            ->pluck("id_desa", "nama_desa");
        return response()->json($desa);
    }

    public function tambah_keranjang(Request $request)
    {
        $check = DB::table("tb_keranjang")
            ->where("id_barang", $request->id_barang)
            ->where("id_user", Auth::user()->id)
            ->count();
        if ($check == 0) {
            CartModel::create([
                "id_barang" => $request->id_barang,
                "id_toko" => $request->id_toko,
                "id_user" => Auth::user()->id,
                "jumlah" => $request->jumlah,
                "sub_harga" => $request->harga * $request->jumlah,
            ]);
        } else {
            $keranjang = DB::table("tb_keranjang")
                ->where("id_barang", $request->id_barang)
                ->where("id_user", Auth::user()->id)
                ->get();

            foreach ($keranjang as $k) {
                $jumlah = $k->jumlah;
                $total = $request->harga * ($jumlah + $request->jumlah);
                CartModel::where("id_keranjang", $k->id_keranjang)->update([
                    "jumlah" => $jumlah + $request->jumlah,
                    "sub_harga" => $total,
                ]);
            }
        }

        return redirect()->back();
    }

    public function hapus($id)
    {
        $keranjang = DB::table("tb_keranjang")
            ->where("id_keranjang", $id)
            ->delete();
        return redirect()->back();
    }

    public function hapus_semua($id)
    {
        $keranjang = DB::table("tb_keranjang")
            ->where("id_user", Auth::user()->id)
            ->where("id_toko", $id)
            ->delete();
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $barang = DB::table("tb_keranjang")
            ->where("id_keranjang", $id)
            ->update([
                "jumlah" => $request->jumlah,
                "sub_harga" => $request->harga * $request->jumlah,
            ]);

        return redirect()->back();
    }
}
