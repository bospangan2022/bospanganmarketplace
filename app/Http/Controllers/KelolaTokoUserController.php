<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KelolaTokoUserController extends Controller
{
    public function index()
    {
        return view("admin_toko.dashboard");
    }
}
