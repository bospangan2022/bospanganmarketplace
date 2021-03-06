<?php

namespace App\Http\Controllers;

use App\Mail\KirimPesanan;
use App\Mail\KonfirmasiPesanan;
use App\Mail\SelesaikanPesanan;
use App\Models\Checkout;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PemesananController extends Controller
{
    public function index()
    {
        $toko = DB::table("users")
            ->join("tb_toko", "users.id", "=", "tb_toko.id_user")
            ->where("tb_toko.id_user", Auth::user()->id)
            ->get();
        foreach ($toko as $tk) {
            $id_toko = $tk->id_toko;
            $pesanan = DB::table("tb_checkout")
                ->join("users", "tb_checkout.id_user", "=", "users.id")
                ->join("user_detail", "users.id", "=", "user_detail.id_user")
                ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
                ->join(
                    "tb_kecamatan",
                    "user_detail.id_kecamatan",
                    "=",
                    "tb_kecamatan.id_kecamatan"
                )
                ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
                ->where("id_toko", $id_toko)
                ->orderByDesc("id_checkout")
                ->paginate(5);
            // ->get();

            // dd($pesanan);
            $semua = DB::table("tb_checkout")
                ->join("users", "tb_checkout.id_user", "=", "users.id")
                ->join("user_detail", "users.id", "=", "user_detail.id_user")
                ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
                ->join(
                    "tb_kecamatan",
                    "user_detail.id_kecamatan",
                    "=",
                    "tb_kecamatan.id_kecamatan"
                )
                ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
                ->where("id_toko", $id_toko)
                ->count();
            $belum_bayar = DB::table("tb_checkout")
                ->join("users", "tb_checkout.id_user", "=", "users.id")
                ->join("user_detail", "users.id", "=", "user_detail.id_user")
                ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
                ->join(
                    "tb_kecamatan",
                    "user_detail.id_kecamatan",
                    "=",
                    "tb_kecamatan.id_kecamatan"
                )
                ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
                ->where("id_toko", $id_toko)
                ->where("tb_checkout.status", "belumdibayar")
                ->count();
            $dikemas = DB::table("tb_checkout")
                ->join("users", "tb_checkout.id_user", "=", "users.id")
                ->join("user_detail", "users.id", "=", "user_detail.id_user")
                ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
                ->join(
                    "tb_kecamatan",
                    "user_detail.id_kecamatan",
                    "=",
                    "tb_kecamatan.id_kecamatan"
                )
                ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
                ->where("id_toko", $id_toko)
                ->where("tb_checkout.status", "dikemas")
                ->count();
            $dikirim = DB::table("tb_checkout")
                ->join("users", "tb_checkout.id_user", "=", "users.id")
                ->join("user_detail", "users.id", "=", "user_detail.id_user")
                ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
                ->join(
                    "tb_kecamatan",
                    "user_detail.id_kecamatan",
                    "=",
                    "tb_kecamatan.id_kecamatan"
                )
                ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
                ->where("id_toko", $id_toko)
                ->where("tb_checkout.status", "dikirim")
                ->count();
            $selesai = DB::table("tb_checkout")
                ->join("users", "tb_checkout.id_user", "=", "users.id")
                ->join("user_detail", "users.id", "=", "user_detail.id_user")
                ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
                ->join(
                    "tb_kecamatan",
                    "user_detail.id_kecamatan",
                    "=",
                    "tb_kecamatan.id_kecamatan"
                )
                ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
                ->where("id_toko", $id_toko)
                ->where("tb_checkout.status", "selesai")
                ->count();
        }

        return view("admin.pemesanan", [
            "pesanan" => $pesanan,
            "belum_bayar" => $belum_bayar,
            "dikemas" => $dikemas,
            "dikirim" => $dikirim,
            "selesai" => $selesai,
            "semua" => $semua,
        ]);
    }

    public function pemesanan_all()
    {
        $pesanan = DB::table("tb_checkout")
            ->join("tb_toko", "tb_checkout.id_toko", "=", "tb_toko.id_toko")
            ->join("users", "tb_checkout.id_user", "=", "users.id")
            ->join("user_detail", "users.id", "=", "user_detail.id_user")
            ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
            ->join(
                "tb_kecamatan",
                "user_detail.id_kecamatan",
                "=",
                "tb_kecamatan.id_kecamatan"
            )
            ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
            ->orderByDesc("id_checkout")
            ->paginate(5);
        // ->get();

        // dd($pesanan);

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
            ->get();
        $semua = DB::table("tb_checkout")
            ->join("users", "tb_checkout.id_user", "=", "users.id")
            ->join("user_detail", "users.id", "=", "user_detail.id_user")
            ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
            ->join(
                "tb_kecamatan",
                "user_detail.id_kecamatan",
                "=",
                "tb_kecamatan.id_kecamatan"
            )
            ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
            ->count();
        $belum_bayar = DB::table("tb_checkout")
            ->join("users", "tb_checkout.id_user", "=", "users.id")
            ->join("user_detail", "users.id", "=", "user_detail.id_user")
            ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
            ->join(
                "tb_kecamatan",
                "user_detail.id_kecamatan",
                "=",
                "tb_kecamatan.id_kecamatan"
            )
            ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
            ->where("tb_checkout.status", "belumdibayar")
            ->count();
        $dikemas = DB::table("tb_checkout")
            ->join("users", "tb_checkout.id_user", "=", "users.id")
            ->join("user_detail", "users.id", "=", "user_detail.id_user")
            ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
            ->join(
                "tb_kecamatan",
                "user_detail.id_kecamatan",
                "=",
                "tb_kecamatan.id_kecamatan"
            )
            ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
            ->where("tb_checkout.status", "dikemas")
            ->count();
        $dikirim = DB::table("tb_checkout")
            ->join("users", "tb_checkout.id_user", "=", "users.id")
            ->join("user_detail", "users.id", "=", "user_detail.id_user")
            ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
            ->join(
                "tb_kecamatan",
                "user_detail.id_kecamatan",
                "=",
                "tb_kecamatan.id_kecamatan"
            )
            ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
            ->where("tb_checkout.status", "dikirim")
            ->count();
        $selesai = DB::table("tb_checkout")
            ->join("users", "tb_checkout.id_user", "=", "users.id")
            ->join("user_detail", "users.id", "=", "user_detail.id_user")
            ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
            ->join(
                "tb_kecamatan",
                "user_detail.id_kecamatan",
                "=",
                "tb_kecamatan.id_kecamatan"
            )
            ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
            ->where("tb_checkout.status", "selesai")
            ->count();

        return view("admin.pemesanan_all", [
            "pesanan" => $pesanan,
            "belum_bayar" => $belum_bayar,
            "dikemas" => $dikemas,
            "dikirim" => $dikirim,
            "selesai" => $selesai,
            "semua" => $semua,
            "toko" => $toko,
        ]);
    }

    public function pemesanan_detail($id)
    {
        $pesanan = DB::table("tb_checkout")
            ->join("users", "tb_checkout.id_user", "=", "users.id")
            ->join("user_detail", "users.id", "=", "user_detail.id_user")
            ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
            ->join(
                "tb_kecamatan",
                "user_detail.id_kecamatan",
                "=",
                "tb_kecamatan.id_kecamatan"
            )
            ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
            ->where("id_checkout", $id)
            ->get();

        $checkout = DB::table("tb_checkout")
            ->where("id_checkout", $id)
            ->get();

        return view("admin.pemesanan_detail", [
            "pesanan" => $pesanan,
            "checkout" => $checkout,
        ]);
    }

    public function konfirmasi_pesanan(Request $request, $id)
    {
        $pesanan = Checkout::where("id_checkout", $id)->update([
            "status" => "dikemas",
        ]);

        Mail::to($request->email)->send(new KonfirmasiPesanan());

        return redirect()->back();
    }

    public function kirim_pesanan(Request $request, $id)
    {
        $pesanan = Checkout::where("id_checkout", $id)->update([
            "status" => "dikirim",
        ]);

        Mail::to($request->email)->send(new KirimPesanan());

        return redirect()->back();
    }

    public function selesai_pesanan(Request $request, $id)
    {
        $pesanan = Checkout::where("id_checkout", $id)->update([
            "status" => "selesai",
        ]);

        Mail::to($request->email)->send(new SelesaikanPesanan());

        return redirect()->back();
    }

    public function filter($id)
    {
        $toko = DB::table("users")
            ->join("tb_toko", "users.id", "=", "tb_toko.id_user")
            ->where("tb_toko.id_user", Auth::user()->id)
            ->get();
        foreach ($toko as $tk) {
            $id_toko = $tk->id_toko;
            $pesanan = DB::table("tb_checkout")
                ->join("users", "tb_checkout.id_user", "=", "users.id")
                ->join("user_detail", "users.id", "=", "user_detail.id_user")
                ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
                ->join(
                    "tb_kecamatan",
                    "user_detail.id_kecamatan",
                    "=",
                    "tb_kecamatan.id_kecamatan"
                )
                ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
                ->where("id_toko", $id_toko)
                ->where("tb_checkout.status", $id)
                ->orderByDesc("id_checkout")
                ->get();
            $semua = DB::table("tb_checkout")
                ->join("users", "tb_checkout.id_user", "=", "users.id")
                ->join("user_detail", "users.id", "=", "user_detail.id_user")
                ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
                ->join(
                    "tb_kecamatan",
                    "user_detail.id_kecamatan",
                    "=",
                    "tb_kecamatan.id_kecamatan"
                )
                ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
                ->where("id_toko", $id_toko)
                ->count();
            $belum_bayar = DB::table("tb_checkout")
                ->join("users", "tb_checkout.id_user", "=", "users.id")
                ->join("user_detail", "users.id", "=", "user_detail.id_user")
                ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
                ->join(
                    "tb_kecamatan",
                    "user_detail.id_kecamatan",
                    "=",
                    "tb_kecamatan.id_kecamatan"
                )
                ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
                ->where("id_toko", $id_toko)
                ->where("tb_checkout.status", "belumdibayar")
                ->count();
            $dikemas = DB::table("tb_checkout")
                ->join("users", "tb_checkout.id_user", "=", "users.id")
                ->join("user_detail", "users.id", "=", "user_detail.id_user")
                ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
                ->join(
                    "tb_kecamatan",
                    "user_detail.id_kecamatan",
                    "=",
                    "tb_kecamatan.id_kecamatan"
                )
                ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
                ->where("id_toko", $id_toko)
                ->where("tb_checkout.status", "dikemas")
                ->count();
            $dikirim = DB::table("tb_checkout")
                ->join("users", "tb_checkout.id_user", "=", "users.id")
                ->join("user_detail", "users.id", "=", "user_detail.id_user")
                ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
                ->join(
                    "tb_kecamatan",
                    "user_detail.id_kecamatan",
                    "=",
                    "tb_kecamatan.id_kecamatan"
                )
                ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
                ->where("id_toko", $id_toko)
                ->where("tb_checkout.status", "dikirim")
                ->count();
            $selesai = DB::table("tb_checkout")
                ->join("users", "tb_checkout.id_user", "=", "users.id")
                ->join("user_detail", "users.id", "=", "user_detail.id_user")
                ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
                ->join(
                    "tb_kecamatan",
                    "user_detail.id_kecamatan",
                    "=",
                    "tb_kecamatan.id_kecamatan"
                )
                ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
                ->where("id_toko", $id_toko)
                ->where("tb_checkout.status", "selesai")
                ->count();
        }
        return view("admin.pemesanan", [
            "pesanan" => $pesanan,
            "belum_bayar" => $belum_bayar,
            "dikemas" => $dikemas,
            "dikirim" => $dikirim,
            "selesai" => $selesai,
            "semua" => $semua,
        ]);
    }

    public function filter_all($id)
    {
        $pesanan = DB::table("tb_checkout")
            ->join("users", "tb_checkout.id_user", "=", "users.id")
            ->join("user_detail", "users.id", "=", "user_detail.id_user")
            ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
            ->join(
                "tb_kecamatan",
                "user_detail.id_kecamatan",
                "=",
                "tb_kecamatan.id_kecamatan"
            )
            ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
            ->where("tb_checkout.status", $id)
            ->join("tb_toko", "tb_checkout.id_toko", "=", "tb_toko.id_toko")
            ->orderByDesc("id_checkout")
            ->get();

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
            ->get();
        $semua = DB::table("tb_checkout")
            ->join("users", "tb_checkout.id_user", "=", "users.id")
            ->join("user_detail", "users.id", "=", "user_detail.id_user")
            ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
            ->join(
                "tb_kecamatan",
                "user_detail.id_kecamatan",
                "=",
                "tb_kecamatan.id_kecamatan"
            )
            ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
            ->count();
        $belum_bayar = DB::table("tb_checkout")
            ->join("users", "tb_checkout.id_user", "=", "users.id")
            ->join("user_detail", "users.id", "=", "user_detail.id_user")
            ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
            ->join(
                "tb_kecamatan",
                "user_detail.id_kecamatan",
                "=",
                "tb_kecamatan.id_kecamatan"
            )
            ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
            ->where("tb_checkout.status", "belumdibayar")
            ->count();
        $dikemas = DB::table("tb_checkout")
            ->join("users", "tb_checkout.id_user", "=", "users.id")
            ->join("user_detail", "users.id", "=", "user_detail.id_user")
            ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
            ->join(
                "tb_kecamatan",
                "user_detail.id_kecamatan",
                "=",
                "tb_kecamatan.id_kecamatan"
            )
            ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
            ->where("tb_checkout.status", "dikemas")
            ->count();
        $dikirim = DB::table("tb_checkout")
            ->join("users", "tb_checkout.id_user", "=", "users.id")
            ->join("user_detail", "users.id", "=", "user_detail.id_user")
            ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
            ->join(
                "tb_kecamatan",
                "user_detail.id_kecamatan",
                "=",
                "tb_kecamatan.id_kecamatan"
            )
            ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
            ->where("tb_checkout.status", "dikirim")
            ->count();
        $selesai = DB::table("tb_checkout")
            ->join("users", "tb_checkout.id_user", "=", "users.id")
            ->join("user_detail", "users.id", "=", "user_detail.id_user")
            ->join("tb_kota", "user_detail.id_kota", "=", "tb_kota.id_kota")
            ->join(
                "tb_kecamatan",
                "user_detail.id_kecamatan",
                "=",
                "tb_kecamatan.id_kecamatan"
            )
            ->join("tb_desa", "user_detail.id_desa", "=", "tb_desa.id_desa")
            ->where("tb_checkout.status", "selesai")
            ->count();

        return view("admin.pemesanan_all", [
            "pesanan" => $pesanan,
            "belum_bayar" => $belum_bayar,
            "dikemas" => $dikemas,
            "dikirim" => $dikirim,
            "selesai" => $selesai,
            "semua" => $semua,
            "toko" => $toko,
        ]);
    }
}
