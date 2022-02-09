<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TokoAdminController extends Controller
{
    public function index()
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
            ->get();
        return view("admin.toko", ["toko" => $toko]);
    }

    public function update(Request $request, $id)
    {
        $toko = DB::table("tb_toko")
            ->where("id_toko", $id)
            ->get();
        foreach ($toko as $t) {
            $status = $t->status;
            if ($status == "s") {
                DB::table("tb_toko")
                    ->where("id_toko", $id)
                    ->update([
                        "status" => "ts",
                    ]);
            } else {
                DB::table("tb_toko")
                    ->where("id_toko", $id)
                    ->update([
                        "status" => "s",
                    ]);
            }
        }

        return redirect()->back();
    }
}
