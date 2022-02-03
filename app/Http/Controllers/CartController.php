<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartModel;
use App\Models\District;
use App\Models\Village;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $keranjang= DB::table('tb_keranjang')
        ->join('tb_barang', 'tb_keranjang.id_barang', '=', 'tb_barang.id_barang')
        ->where('id_user', Auth::user()->id)
        ->where('status', 't')
        ->get();

        $sub_total = DB::table('tb_keranjang')->where('id_user', Auth::user()->id)->sum('sub_harga');
        $ppn = $sub_total*0.1;
        $ongkir= 0; 
        $grand_total= $sub_total+$ongkir;
        $count_barang= DB::table('tb_keranjang')->where('id_user', Auth::user()->id)->count('id_barang');
        $count_love= DB::table('tb_wishlist')->where('id_user', Auth::user()->id)->count('id_barang');

        $kota=  DB::table('regencies')
        ->reorder('nama_kota','asc')
        ->get();
       
        return view('marketplace.cart',['keranjang'=>$keranjang, 'sub_total'=>$sub_total, 'ppn'=>$ppn, 'ongkir'=>$ongkir, 'grand_total'=>$grand_total, 'count_barang'=>$count_barang, 'count_love'=>$count_love, 'kota'=>$kota]);
    }

    public function getKec(Request $request)
    {
        $kecamatan = District::where("regency_id", $request->id_kota)->reorder('nama_kecamatan','asc')->pluck('id', 'nama_kecamatan');
        return response()->json($kecamatan);
    }

    public function getDesa(Request $request)
    {
        $desa = Village::where("district_id", $request->id_kecamatan)->reorder('nama_desa','asc')->pluck('id', 'nama_desa');
        return response()->json($desa);
    }

    public function tambah_keranjang(Request $request)
    {
        $check = DB::table('tb_keranjang')->where('id_barang', $request->id_barang)->where('id_user', Auth::user()->id)->count();
        if ($check == 0) {
            CartModel::create([
            'id_barang'     => $request->id_barang,
            'id_user'       => Auth::user()->id,
            'jumlah'        => $request->jumlah,
            'sub_harga'     => $request->harga*$request->jumlah
        ]);
        
        } else {
            $keranjang = DB::table('tb_keranjang')->where('id_barang', $request->id_barang)->where('id_user', Auth::user()->id)->get();
            
            foreach($keranjang as $k){
                $jumlah = $k->jumlah;
                $total = $request->harga*($jumlah+$request->jumlah);
                    CartModel::where('id_keranjang', $k->id_keranjang)->update(['jumlah'=>$jumlah+$request->jumlah, 'sub_harga'=>$total]);
                }
        }

        return redirect()->back();
    }

    public function hapus($id)
    {
        $keranjang= DB::table('tb_keranjang')->where('id_keranjang',$id)->delete();
        return redirect()->back();
    }
    
    
    public function hapus_semua()
    {
        $keranjang= DB::table('tb_keranjang')->where('id_user', Auth::user()->id)->delete();
        return redirect()->back();
    }

    public function update(Request $request,$id)
    {
        $barang = DB::table('tb_keranjang')->where('id_keranjang', $id)->update([
            'jumlah'        => $request->jumlah,
            'sub_harga'     => $request->harga*$request->jumlah
        ]);
    
        return redirect()->back();
    }

  


}
