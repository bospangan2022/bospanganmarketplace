<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    use HasFactory;

    protected $table = 'tb_barang';

    protected $fillable = [
         'id_kategori' , 'nama_barang', 'sku', 'berat', 'keterangan', 'harga' , 'harga_satuan', 'satuan', 'stok', 'foto' 
    ];
}
