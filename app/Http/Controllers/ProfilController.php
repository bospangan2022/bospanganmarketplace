<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\UserDetailModel;

class ProfilController extends Controller
{
    public function index()
    {
        $utama = DB::table("user_detail")
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

        $profil = DB::table("user_detail")
            ->leftjoin("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
            ->leftjoin(
                "tb_kecamatan",
                "user_detail.id_kecamatan",
                "=",
                "tb_kecamatan.id_kecamatan"
            )
            ->leftjoin("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
            ->where("id_user", Auth::user()->id)
            ->where("status", "Biasa")
            ->get();

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
        return view("marketplace.profil", [
            "utama" => $utama,
            "profil" => $profil,
            "kota" => $kota,
            "keranjang" => $keranjang,
            "count_barang" => $count_barang,
            "count_love" => $count_love,
            "sub_total" => $sub_total,
        ]);
    }

    public function tambah_alamat(Request $request)
    {
        UserDetailModel::create([
            "id_user" => Auth::user()->id,
            "nama_penerima" => $request->nama_penerima,
            "phone" => $request->phone,
            "alamat" => $request->alamat,
            "id_regencies" => $request->kota,
            "id_districts" => $request->kecamatan,
            "id_villages" => $request->desa,
            "kode_pos" => $request->kode_pos,
            "catatan" => $request->catatan,
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
                "id_regencies" => $request->kota,
                "id_districts" => $request->kecamatan,
                "id_villages" => $request->desa,
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
