<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $table = "tb_bank";

    protected $fillable = ["nama_bank", "atas_nama", "no_rek"];
}
