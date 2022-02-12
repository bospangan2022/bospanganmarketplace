<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatalPesanan extends Model
{
    use HasFactory;
    protected $table = "tb_batalpesanan";

    protected $fillable = ["id_checkout", "alasan"];
}
