<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriBarang;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function index()
    {
        $kategori = KategoriBarang::all();
        $barang = DB::table("tb_barang")->get();
        $jumlah = $barang->count();
        $toko = DB::table("tb_toko")
            ->where("id_user", Auth::user()->id)
            ->get();
        foreach ($toko as $t) {
            $id_toko = $t->id_toko;
        }
        $page = DB::table("tb_barang")
            ->latest()
            ->paginate(5);
        $stok = DB::table("tb_barang")
            ->where("id_toko", $id_toko)
            ->where("stok", 0)
            ->get();
        $habis = $stok->count();
        $status = DB::table("tb_barang")
            ->where("id_toko", $id_toko)
            ->where("status", "Sembunyikan")
            ->get();
        $hide = $status->count();
        $status2 = DB::table("tb_barang")
            ->where("id_toko", $id_toko)
            ->where("status", "tampilkan")
            ->get();
        $tampil = $status2->count();
        // $jumlah = DB::table('tb_barang')->count();
        return view("admin.produk", [
            "barang" => $barang,
            "kategori" => $kategori,
            "jumlah" => $jumlah,
            "page" => $page,
            "habis" => $habis,
            "hide" => $hide,
            "tampil" => $tampil,
        ]);
    }
    public function filter_kategori($id)
    {
        $kategori = KategoriBarang::all();
        $barang = DB::table("tb_barang")
            ->where("id_kategori", $id)
            ->get();
        $jumlah = $barang->count();
        $toko = DB::table("tb_toko")
            ->where("id_user", Auth::user()->id)
            ->get();
        foreach ($toko as $t) {
            $id_toko = $t->id_toko;
        }
        $page = DB::table("tb_barang")
            ->where("id_kategori", $id)
            ->latest()
            ->paginate(5);
        $stok = DB::table("tb_barang")
            ->where("id_toko", $id_toko)
            ->where("stok", 0)
            ->get();
        $habis = $stok->count();
        $status = DB::table("tb_barang")
            ->where("id_toko", $id_toko)
            ->where("status", "Sembunyikan")
            ->get();
        $hide = $status->count();
        $status2 = DB::table("tb_barang")
            ->where("id_toko", $id_toko)
            ->where("status", "tampilkan")
            ->get();
        $tampil = $status2->count();
        // $jumlah = DB::table('tb_barang')->count();
        return view("admin.produk", [
            "barang" => $barang,
            "kategori" => $kategori,
            "jumlah" => $jumlah,
            "page" => $page,
            "habis" => $habis,
            "hide" => $hide,
            "tampil" => $tampil,
        ]);
    }
    public function tambah_produk()
    {
        $kategori = KategoriBarang::all();
        return view("admin.tambah_produk", compact("kategori"));
    }

    public function display()
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
        $status = DB::table("tb_barang")
            ->where("id_toko", $id_toko)
            ->where("status", "Sembunyikan")
            ->get();
        $hide = $status->count();
        $status2 = DB::table("tb_barang")
            ->where("id_toko", $id_toko)
            ->where("status", "tampilkan")
            ->get();
        $tampil = $status2->count();
        $page = DB::table("tb_barang")
            ->where("id_toko", $id_toko)
            ->where("status", "tampilkan")
            ->latest()
            ->paginate(5);

        return view("admin.produk", [
            "barang" => $barang,
            "jumlah" => $jumlah,
            "page" => $page,
            "habis" => $habis,
            "hide" => $hide,
            "tampil" => $tampil,
            "kategori" => $kategori,
        ]);
    }

    public function habis()
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
        $status = DB::table("tb_barang")
            ->where("id_toko", $id_toko)
            ->where("status", "Sembunyikan")
            ->get();
        $hide = $status->count();
        $status2 = DB::table("tb_barang")
            ->where("id_toko", $id_toko)
            ->where("status", "tampilkan")
            ->get();
        $tampil = $status2->count();
        $page = DB::table("tb_barang")
            ->where("id_toko", $id_toko)
            ->where("stok", 0)
            ->latest()
            ->paginate(5);

        return view("admin.produk", [
            "barang" => $barang,
            "jumlah" => $jumlah,
            "page" => $page,
            "habis" => $habis,
            "hide" => $hide,
            "tampil" => $tampil,
            "kategori" => $kategori,
        ]);
    }

    public function hide()
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
        $status = DB::table("tb_barang")
            ->where("id_toko", $id_toko)
            ->where("status", "Sembunyikan")
            ->get();
        $hide = $status->count();
        $status2 = DB::table("tb_barang")
            ->where("id_toko", $id_toko)
            ->where("status", "tampilkan")
            ->get();
        $tampil = $status2->count();
        $page = DB::table("tb_barang")
            ->where("id_toko", $id_toko)
            ->where("status", "Sembunyikan")
            ->latest()
            ->paginate(5);

        return view("admin.produk", [
            "barang" => $barang,
            "jumlah" => $jumlah,
            "page" => $page,
            "habis" => $habis,
            "hide" => $hide,
            "tampil" => $tampil,
            "kategori" => $kategori,
        ]);
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

        $barang = BarangModel::create([
            "id_kategori" => $request->id_kategori,
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
        return redirect()->route("produk");
    }

    public function edit_produk($id)
    {
        $kategori = KategoriBarang::all();
        $barang_id = DB::table("tb_barang")
            ->where("id_barang", $id)
            ->get();
        return view("admin.edit_produk", [
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
                "status" => $request->status,
                "stok" => $request->stok,
                "foto" => $image_name,
            ]);

        // dd($barang);

        return redirect()->route("produk");
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
        $search = DB::table("tb_barang")
            ->orWhere("nama_barang", "LIKE", "%{$keyword}%")
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
