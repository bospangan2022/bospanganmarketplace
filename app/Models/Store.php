<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $table = "tb_toko";

    protected $fillable = [
        "id_user",
        "nama_toko",
        "foto",
        "alamat",
        "hp_toko",
        "deskripsi",
        "kota",
        "kecamatan",
        "desa",
        "kode_pos",
    ];
}
