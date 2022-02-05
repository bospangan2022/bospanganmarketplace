<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\KategoriBarang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KategoriUserController extends Controller
{
    public function index()
    {
        $toko = DB::table("tb_toko")
            ->where("id_user", Auth::user()->id)
            ->get();
        foreach ($toko as $t) {
            $id_toko = $t->id_toko;
        }
        $menu = DB::table("tb_kategori")
            ->where("id_toko", "!=", $id_toko)
            ->get();
        $menunew = DB::table("tb_kategori")
            ->where("id_toko", $id_toko)
            ->get();
        $kategori = KategoriBarang::all();
        return view("admin_toko/tambah_kategori", [
            "menu" => $menu,
            "menunew" => $menunew,
            '$kategori' => $kategori,
        ]);
    }

    public function tambah_proses(Request $request)
    {
        $request->validate([
            "foto" => "required|image|mimes:jpeg,png,jpg|max:2048",
        ]);

        // $imageName = time() . ' . ' . $request->image->extension();
        // $request->image->move(public_path('bukti'), $imageName);

        $image = $request->file("foto");
        $name = rand(1000, 9999) . "." . $image->getClientOriginalExtension();
        $image->move("images/post", $name);
        $toko = DB::table("tb_toko")
            ->where("id_user", Auth::user()->id)
            ->get();
        foreach ($toko as $t) {
            $id_toko = $t->id_toko;
        }
        $kategori = KategoriBarang::create([
            "nama_kategori" => $request->nama_kategori,
            "id_toko" => $id_toko,
            "deskripsi" => $request->deskripsi,
            "foto" => $name,
            "status_kategori" => $request->status_kategori,
        ]);

        return redirect()->route("tambah_kategori_user");
    }
    public function tampil_kategori($id)
    {
        $toko = DB::table("tb_toko")
            ->where("id_user", Auth::user()->id)
            ->get();
        foreach ($toko as $t) {
            $id_toko = $t->id_toko;
        }
        $kategori = DB::table("tb_kategori")
            ->where("id_kategori", $id)
            ->get();
        $menu = DB::table("tb_kategori")
            ->where("id_toko", "!=", $id_toko)
            ->get();
        $menunew = DB::table("tb_kategori")
            ->where("id_toko", $id_toko)
            ->get();
        return view("admin_toko/kategori", [
            "kategori" => $kategori,
            "menu" => $menu,
            "menunew" => $menunew,
        ]);
    }
    public function tampil_kategorinew($id)
    {
        $toko = DB::table("tb_toko")
            ->where("id_user", Auth::user()->id)
            ->get();
        foreach ($toko as $t) {
            $id_toko = $t->id_toko;
        }
        $menu = DB::table("tb_kategori")
            ->where("id_toko", "!=", $id_toko)
            ->get();
        $menunew = DB::table("tb_kategori")
            ->where("id_toko", $id_toko)
            ->get();
        $kategori = DB::table("tb_kategori")
            ->where("id_kategori", $id)
            ->get();

        return view("admin_toko/kategorinew", [
            "kategori" => $kategori,
            "menu" => $menu,
            "menunew" => $menunew,
        ]);
    }

    public function update_kategori(Request $request, $id)
    {
        $kategori = KategoriBarang::where("id_kategori", $id)->update([
            "status_kategori" => $request->status,
        ]);
        return redirect()->back();
    }
}
