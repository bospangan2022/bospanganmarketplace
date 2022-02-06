<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetailModel extends Model
{
    use HasFactory;

    protected $table = "user_detail";

    protected $fillable = [
        "id_user",
        "nama_penerima",
        "phone",
        "alamat",
        "id_kota",
        "id_kecamatan",
        "id_desa",
        "kode_pos",
        "catatan",
    ];
}
