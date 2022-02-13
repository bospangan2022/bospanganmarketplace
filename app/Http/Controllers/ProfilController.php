<?php

namespace App\Http\Controllers;

use App\Models\BatalPesanan;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\UserDetailModel;
use App\Models\Village;

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

        $katlimit = DB::table("tb_kategori")
            ->limit(5)
            ->get();

        // dd($utama);

        $belum_dibayar = DB::table("tb_checkout")
            ->where("id_user", Auth::user()->id)
            ->where("status", "belumdibayar")
            ->count();
        $dikemas = DB::table("tb_checkout")
            ->where("id_user", Auth::user()->id)
            ->where("status", "dikemas")
            ->count();
        $dikirim = DB::table("tb_checkout")
            ->where("id_user", Auth::user()->id)
            ->where("status", "dikirim")
            ->count();
        $checkout = DB::table("tb_checkout")
            ->where("id_user", Auth::user()->id)
            ->orderByDesc("id_checkout")
            ->get();
        //dd($checkout);
        return view("marketplace.profil", [
            "utama" => $utama,
            "profil" => $profil,
            "kota" => $kota,
            "keranjang" => $keranjang,
            "count_barang" => $count_barang,
            "count_love" => $count_love,
            "sub_total" => $sub_total,
            "katlimit" => $katlimit,
            "belum_dibayar" => $belum_dibayar,
            "dikirim" => $dikirim,
            "dikemas" => $dikemas,
            "checkout" => $checkout,
        ]);
    }

    public function tambah_alamat(Request $request)
    {
        UserDetailModel::create([
            "id_user" => Auth::user()->id,
            "nama_penerima" => $request->nama_penerima,
            "phone" => $request->phone,
            "alamat" => $request->alamat,
            "id_kota" => $request->kota,
            "id_kecamatan" => $request->kecamatan,
            "id_desa" => $request->desa,
            "kode_pos" => $request->kode_pos,
            "catatan" => $request->catatan,
        ]);

        notify()->success("Alamat baru anda telah ditambahkan", "Berhasil");
        return redirect()->back();
    }

    public function updAlamat(Request $request, $id)
    {
        $updAlamat = DB::table("user_detail")
            ->where("id_user_detail", $id)
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

        $katlimit = DB::table("tb_kategori")
            ->limit(5)
            ->get();

        return view("marketplace.ubahalamat", [
            "updAlamat" => $updAlamat,
            "kota" => $kota,
            "keranjang" => $keranjang,
            "count_barang" => $count_barang,
            "count_love" => $count_love,
            "sub_total" => $sub_total,
            "katlimit" => $katlimit,
        ]);
    }

    public function update_alamat(Request $request, $id)
    {
        DB::table("user_detail")
            ->where("id_user_detail", $id)
            ->update([
                "nama_penerima" => $request->nama_penerima,
                "phone" => $request->phone,
                "alamat" => $request->alamat,
                "id_kota" => $request->kota,
                "id_kecamatan" => $request->kecamatan,
                "id_desa" => $request->desa,
                "kode_pos" => $request->kode_pos,
                "catatan" => $request->catatan,
            ]);

        notify()->success("Alamat yang anda pilih telah di ubah", "Berhasil");
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

        notify()->success(
            "Alamat yang anda pilih , sudah dijadikan sebagai alamat utama",
            "Berhasil"
        );
        return redirect()->back();
    }

    public function hapus_alamat($id)
    {
        $profil = DB::table("user_detail")
            ->where("id_user_detail", $id)
            ->delete();

        notify()->success("Alamat yang anda pilih telah dihapus", "Berhasil");
        return redirect()->back();
    }

    public function batalPesanan(Request $request)
    {
        BatalPesanan::create([
            "id_checkout" => $request->id_checkout,
            "alasan" => $request->alasan,
        ]);

        $batal = DB::table("tb_checkout")
            ->where("id_checkout", $request->id_checkout)
            ->update(["status" => "dibatalkan"]);
        // ->get();

        // dd($batal);

        notify()->success("Pesanan Anda Dibatalkan", "Berhasil");
        return redirect()->back();
    }
}
