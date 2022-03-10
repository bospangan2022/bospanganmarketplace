<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BankController extends Controller
{
    public function index()
    {
        $bank = DB::table("tb_bank")->get();
        return view("admin.bank", ["bank" => $bank]);
    }

    public function proses_tambah(Request $request)
    {
        Bank::create([
            "nama_bank" => $request->nama_bank,
            "no_rek" => $request->no_rek,
            "atas_nama" => $request->atas_nama,
        ]);

        return redirect()->back();
    }

    public function proses_edit(Request $request, $id)
    {
        Bank::where("id_bank", $id)->update([
            "nama_bank" => $request->nama_bank,
            "atas_nama" => $request->atas_nama,
            "no_rek" => $request->no_rek,
        ]);

        return redirect()->back();
    }

    public function proses_hapus($id)
    {
        DB::table("tb_bank")
            ->where("id_bank", $id)
            ->delete();

        return redirect()->back();
    }
}
