<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\District;
use App\Models\Store;
use App\Models\Village;

use App\Models\UserDetailModel;

class StoreController extends Controller
{
    public function index()
    {
        $kota = DB::table("tb_kota")
            ->reorder("nama_kota", "asc")
            ->get();

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

        // dd($utama);
        return view("marketplace.buka_toko", [
            "kota" => $kota,
            "keranjang" => $keranjang,
            "count_barang" => $count_barang,
            "count_love" => $count_love,
            "sub_total" => $sub_total,
        ]);
    }

    public function getKec(Request $request)
    {
        $kecamatan = District::where("regency_id", $request->id_kota)
            ->reorder("nama_kecamatan", "asc")
            ->pluck("id", "nama_kecamatan");
        return response()->json($kecamatan);
    }

    public function getDesa(Request $request)
    {
        $desa = Village::where("district_id", $request->id_kecamatan)
            ->reorder("nama_desa", "asc")
            ->pluck("id", "nama_desa");
        return response()->json($desa);
    }

    public function tambah_toko(Request $request)
    {
        Store::create([
            "id_user" => Auth::user()->id,
            "nama_toko" => $request->nama_toko,
            "alamat" => $request->alamat,
            "hp_toko" => $request->phone,
            "kota" => $request->kota,
            "kecamatan" => $request->kecamatan,
            "desa" => $request->desa,
            "kode_pos" => $request->kode_pos,
        ]);

        return redirect()->back();
    }

    public function update_alamat(Request $request, $id)
    {
        DB::table("user_detail")
            ->where("id_user_detail", $id)
            ->update([
                "nama_penerima" => $request->nama_penerima,
                "phone" => $request->phone,
                "alamat" => $request->alamat,
                "id_regencies" => $request->id_regencies,
                "id_districts" => $request->id_districts,
                "id_villages" => $request->id_villages,
                "kode_pos" => $request->kode_pos,
                "catatan" => $request->catatan,
            ]);
        return redirect()->back();
    }

    public function alamat_utama($id)
    {
        DB::table("user_detail")
            ->where(["status" => "utama"])
            ->update(["status" => "biasa"]);
        DB::table("user_detail")
            ->where("id_user_detail", $id)
            ->update(["status" => "utama"]);

        return redirect()->back();
    }

    public function hapus_alamat($id)
    {
        $profil = DB::table("user_detail")
            ->where("id_user_detail", $id)
            ->delete();
        return redirect()->back();
    }
}
