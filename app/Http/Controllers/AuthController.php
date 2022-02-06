<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        $katlimit = DB::table("tb_kategori")
            ->limit(5)
            ->get();
        return view("marketplace.login", ["katlimit" => $katlimit]);
    }

    public function login_admin()
    {
        return view("login");
    }

    public function dashboard()
    {
        return view("admin.dashboard");
    }

    public function proses_login(Request $request)
    {
        request()->validate([
            "username" => "required",
            "password" => "required",
        ]);

        $credentials = $request->only("username", "password");
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == "pelanggan") {
                return redirect()->intended("/");
            } elseif ($user->role == "admin") {
                return redirect()->intended("dashboard");
            }
            return redirect("login");
        }
        Session::flash("error", "Email atau Password Salah");
        return redirect("login");
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect("login");
    }

    public function register(Request $request)
    {
        $katlimit = DB::table("tb_kategori")
            ->limit(5)
            ->get();
        return view("marketplace.register", ["katlimit" => $katlimit]);
    }

    public function proses_registrasi(Request $request)
    {
        $messages = [
            "required" => "Data Ada Yang Belum Diisi !!!",
            "email" => "Format Harus Email",
            "same" => "Password Tidak Cocok",
            "unique" => "Username Atau Email Sudah Dipakai",
        ];

        $request->validate(
            [
                "nama" => "required",
                "email" => "required|email|unique:users",
                "no_hp" => "required",
                "username" => "required|unique:users",
                "password" => "required|min:6",
                "ulangi_password" => "same:password",
                "role" => "required",
            ],
            $messages
        );

        User::create([
            "name" => $request->nama,
            "no_hp" => $request->no_hp,
            "role" => $request->role,
            "username" => $request->username,
            "password" => bcrypt($request->password),
            "email" => $request->email,
        ]);

        return redirect()->route("login");
    }

    public function create(array $data)
    {
        return User::create([
            "name" => $data["nama"],
            "email" => $data["email"],
            "no_hp" => $data["no_hp"],
            "password" => Hash::make($data["password"]),
            "role" => $data["role"],
        ]);
    }
}
