<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\District;
use App\Models\Village;

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
            ->where("tb_toko.nama_toko", $id)
            ->get();

        $count = $barang_toko->count();

        // dd($barang_toko);

        $kat_toko = DB::table("tb_kategori")->get();

        // dd($kat_toko);

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

    public function barangtoko_kat($id, $id2)
    {
        $toko = DB::table("tb_toko")
            ->join("regencies", "tb_toko.kota", "=", "regencies.id")
            ->where("id_toko", $id)
            ->get();

        // dd($toko);

        $kat_toko = DB::table("tb_kategori")->get();

        $katlimit = DB::table("tb_kategori")
            ->limit(5)
            ->get();

        $barang_kat = DB::table("tb_toko")
            ->join("tb_barang", "tb_toko.id_toko", "=", "tb_barang.id_toko")
            ->where("id_kategori", $id2)
            ->where("tb_toko.id_toko", $id)
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
    public function edit_toko()
    {
        $toko = DB::table("tb_toko")
            ->join("users", "tb_toko.id_user", "=", "users.id")
            ->join("tb_kota", "tb_toko.kota", "=", "tb_kota.id_kota")
            ->join(
                "tb_kecamatan",
                "tb_toko.kecamatan",
                "=",
                "tb_kecamatan.id_kecamatan"
            )
            ->join("tb_desa", "tb_toko.desa", "=", "tb_desa.id_desa")
            ->where("id_user", Auth::user()->id)
            ->get();
        $kota = DB::table("tb_kota")
            ->reorder("nama_kota", "asc")
            ->get();
        return view("admin_toko.edit_toko", ["toko" => $toko, "kota" => $kota]);
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
    public function update_toko(Request $request)
    {
        $oldfoto = $request->hidden_image;
        $image = $request->file("foto");

        if ($image != "") {
            $request->validate([
                "foto" => "required|image|mimes:jpeg,png,jpg|max:2048",
            ]);
            $image_name = $oldfoto;
            $image->move("images/post", $image_name);
        } else {
            $image_name = $oldfoto;
        }

        DB::table("tb_toko")
            ->where("id_user", Auth::user()->id)
            ->update([
                "no_hp" => $request->no_hp,
                "alamat" => $request->alamat,
                "foto" => $image_name,
                "kode_pos" => $request->kode_pos,
                "id_kota" => $request->id_kota,
                "id_kecamatan" => $request->id_kecamatan,
                "id_kelurahan" => $request->id_kelurahan,
                "deskripsi" => $request->deskripsi,
            ]);
        return redirect()->route("edit_toko");
    }
}
