<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    use HasFactory;
    protected $table = "tb_keranjang";

    protected $fillable = [
        "id_barang",
        "id_user",
        "id_toko",
        "jumlah",
        "sub_harga",
    ];
}
