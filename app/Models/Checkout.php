<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $table = "tb_checkout";

    protected $fillable = [
        "id_user",
        "subtotal",
        "ongkir",
        "total",
        "tanggal",
        "metode_pembayaran",
        "status",
    ];
}
