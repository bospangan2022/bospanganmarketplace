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
            ->join("regencies", "tb_toko.kota", "=", "regencies.id")
            ->join("districts", "tb_toko.kecamatan", "=", "districts.id")
            ->join("villages", "tb_toko.desa", "=", "villages.id")
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
