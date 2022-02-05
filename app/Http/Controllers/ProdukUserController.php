<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangModel;
use App\Models\KategoriBarang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProdukUserController extends Controller
{
    public function index()
    {
        $kategori = KategoriBarang::all();
        $toko = DB::table("tb_toko")
            ->where("id_user", Auth::user()->id)
            ->get();
        foreach ($toko as $t) {
            $id_toko = $t->id_toko;
        }
        $barang = DB::table("tb_barang")
            ->where("id_toko", $id_toko)
            ->get();
        $jumlah = $barang->count();
        $stok = DB::table("tb_barang")
            ->where("id_toko", $id_toko)
            ->where("stok", 0)
            ->get();
        $habis = $stok->count();
        $page = DB::table("tb_barang")
            ->where("id_toko", $id_toko)
            ->latest()
            ->paginate(5);
        // $jumlah = DB::table('tb_barang')->count();
        return view("admin_toko.produk", [
            "barang" => $barang,
            "kategori" => $kategori,
            "jumlah" => $jumlah,
            "page" => $page,
            "habis" => $habis,
        ]);
    }

    public function tambah_produk()
    {
        $kategori = KategoriBarang::all();
        return view("admin_toko.tambah_produk", compact("kategori"));
    }

    public function proses_tambah(Request $request)
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
        $barang = BarangModel::create([
            "id_kategori" => $request->id_kategori,
            "id_toko" => $id_toko,
            "nama_barang" => $request->nama_barang,
            "sku" => $request->sku,
            "berat" => $request->berat,
            "keterangan" => $request->keterangan,
            "harga" => $request->harga,
            "harga_satuan" => $request->harga_satuan,
            "satuan" => $request->satuan,
            "stok" => $request->stok,
            "foto" => $name,
        ]);

        // dd($request->$id_kategori);
        return redirect()->route("produk_user");
    }

    public function edit_produk($id)
    {
        $kategori = KategoriBarang::all();
        $barang_id = DB::table("tb_barang")
            ->where("id_barang", $id)
            ->get();
        return view("admin_toko.edit_produk", [
            "kategori" => $kategori,
            "barang_id" => $barang_id,
        ]);
    }

    public function update(Request $request, $id)
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

        $barang = DB::table("tb_barang")
            ->where("id_barang", $id)
            ->update([
                "id_kategori" => $request->id_kategori,
                "nama_barang" => $request->nama_barang,
                "sku" => $request->sku,
                "berat" => $request->berat,
                "keterangan" => $request->keterangan,
                "harga" => $request->harga,
                "harga_satuan" => $request->harga_satuan,
                "satuan" => $request->satuan,
                "stok" => $request->stok,
                "foto" => $image_name,
            ]);

        return redirect()->route("produk_user");
    }

    public function destroy($id)
    {
        $barang = DB::table("tb_barang")
            ->where("id_barang", $id)
            ->delete();

        return redirect()->back();
    }

    public function cari_produk(Request $request)
    {
        $keyword = $request->cari;
        $kat = DB::table("tb_kategori")->get();
        $toko = DB::table("tb_toko")
            ->where("id_user", Auth::user()->id)
            ->get();
        foreach ($toko as $t) {
            $id_toko = $t->id_toko;
        }
        $search = DB::table("tb_barang")
            ->where("id_toko", $id_toko)
            ->where("nama_barang", "LIKE", "%{$keyword}%")
            ->get();

        $barang = DB::table("tb_barang")->get();

        $jumlah = $barang->count();

        return view("admin.cari_produk", [
            "search" => $search,
            "keyword" => $keyword,
            "kat" => $kat,
            "jumlah" => $jumlah,
        ]);
    }
}
