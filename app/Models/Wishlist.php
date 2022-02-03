<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'tb_wishlist';

    protected $fillable = [
        'id_user',
        'id_barang',
    ];
}
