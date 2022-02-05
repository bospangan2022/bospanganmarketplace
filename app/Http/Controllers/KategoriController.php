<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\KategoriBarang;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = KategoriBarang::all();
        return view("admin/tambah_kategori", compact("kategori"));
    }

    public function tampil_kategori($id)
    {
        $kategori = DB::table("tb_kategori")
            ->where("id_kategori", $id)
            ->get();
        $menu = DB::table("tb_kategori")->get();
        return view("admin/kategori", [
            "kategori" => $kategori,
            "menu" => $menu,
        ]);
    }

    public function edit_kategori(Request $request, $id)
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

        DB::table("tb_kategori")
            ->where("id_kategori", $id)
            ->update([
                "nama_kategori" => $request->nama_kategori,
                "deskripsi" => $request->deskripsi,
                "foto" => $image_name,
                "status_kategori" => $request->status_kategori,
            ]);
        $menu = DB::table("tb_kategori")->get();
        $kategori = DB::table("tb_kategori")
            ->where("id_kategori", $id)
            ->get();
        return view("admin/kategori", [
            "kategori" => $kategori,
            "menu" => $menu,
        ]);
    }

    public function hapus($id)
    {
        DB::table("tb_kategori")
            ->where("id_kategori", $id)
            ->delete();

        return redirect("tambah_kategori");
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

        $kategori = KategoriBarang::create([
            "nama_kategori" => $request->nama_kategori,
            "deskripsi" => $request->deskripsi,
            "foto" => $name,
            "status_kategori" => $request->status_kategori,
        ]);

        return redirect()->route("tambah_kategori");
    }

    public function update_kategori(Request $request, $id)
    {
        $kategori = KategoriBarang::find($id)->update($request->all());
        return redirect()->route("kategori.index");
    }

    public function kategori_produk($id)
    {
        $kategori = DB::table("tb_kategori")
            ->where("id_kategori", $id)
            ->get();
        $menu = DB::table("tb_kategori")->get();
        $produk = DB::table("tb_barang")
            ->where("id_kategori", $id)
            ->get();
        return view("admin.kategori_produk", [
            "kategori" => $kategori,
            "menu" => $menu,
            "produk" => $produk,
        ]);
    }

    public function hapus_kategoriProduk($id)
    {
        $produk = DB::table("tb_barang")
            ->where("id_barang", $id)
            ->update(["id_kategori" => "0"]);
        return redirect()->back();
    }

    public function tetapkan_kategori($id)
    {
        $kategori = DB::table("tb_kategori")
            ->where("id_kategori", $id)
            ->get();
        $menu = DB::table("tb_kategori")->get();
        $produk = DB::table("tb_barang")
            ->where("id_kategori", $id)
            ->get();
        return view("admin.tetapkan_kategori", ["menu" => $menu]);
    }
}
