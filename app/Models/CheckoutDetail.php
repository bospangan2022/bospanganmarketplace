<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutDetail extends Model
{
    use HasFactory;
    protected $table = "tb_detail_checkout";

    protected $fillable = ["id_checkout", "id_keranjang"];
}
