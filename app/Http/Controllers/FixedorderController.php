<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FixedorderController extends Controller
{
    public function index()
    {
        return view('admin.fixedorder');
    }

    public function fixedorder_detail()
    {
        return view('admin.fixedorder_detail');
    }

    public function edit_detail()
    {
        return view('admin.edit_detail');
    }

    public function buat_pesanan()
    {
        return view('admin.buat_pesanan');
    }
}