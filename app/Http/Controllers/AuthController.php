<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Models\District;
use App\Models\Village;

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
        $toko = DB::table("tb_toko")
            ->join("users", "tb_toko.id_user", "=", "users.id")
            ->join("tb_kota", "tb_toko.kota", "=", "tb_kota.id_kota")
            ->join(
                "tb_kecamatan",
                "tb_toko.kecamatan",
                "=",
                "tb_kecamatan.id_kecamatan"
            )
            ->join("tb_desa", "tb_toko.desa", "=", "tb_desa.id_desa")
            ->where("id_user", Auth::user()->id)
            ->get();
        $kota = DB::table("tb_kota")
            ->reorder("nama_kota", "asc")
            ->get();
        return view("admin.dashboard", ["toko" => $toko, "kota" => $kota]);
    }

    public function edit_toko($id)
    {
        $toko = DB::table("tb_toko")
            ->join("users", "tb_toko.id_user", "=", "users.id")
            ->join("tb_kota", "tb_toko.kota", "=", "tb_kota.id_kota")
            ->join(
                "tb_kecamatan",
                "tb_toko.kecamatan",
                "=",
                "tb_kecamatan.id_kecamatan"
            )
            ->join("tb_desa", "tb_toko.desa", "=", "tb_desa.id_desa")
            ->where("id_user", Auth::user()->id)
            ->where("id_toko", $id)
            ->get();
        $kota = DB::table("tb_kota")
            ->reorder("nama_kota", "asc")
            ->get();
        return view("admin.edit_toko", ["toko" => $toko, "kota" => $kota]);
    }

    public function getKec(Request $request)
    {
        $kecamatan = District::where("id_kota", $request->id_kota)
            ->reorder("nama_kecamatan", "asc")
            ->pluck("id_kecamatan", "nama_kecamatan");
        return response()->json($kecamatan);
    }

    public function getDesa(Request $request)
    {
        $desa = Village::where("id_kecamatan", $request->id_kecamatan)
            ->reorder("nama_desa", "asc")
            ->pluck("id_desa", "nama_desa");
        return response()->json($desa);
    }
    public function update_toko(Request $request)
    {
        $messages = [
            "mimes" => "Extensi Salah",
        ];

        $request->validate(
            [
                "foto" => "required|image|mimes:jpeg,png,jpg|max:2048",
                "kota" => "required",
                "kecamatan" => "required",
                "desa" => "required",
            ],
            $messages
        );

        // $imageName = time() . ' . ' . $request->image->extension();
        // $request->image->move(public_path('bukti'), $imageName);

        $image = $request->file("foto");
        $name = rand(1000, 9999) . "." . $image->getClientOriginalExtension();
        $image->move("images/post", $name);

        DB::table("tb_toko")
            ->where("id_user", Auth::user()->id)
            ->update([
                "hp_toko" => $request->hp_toko,
                "alamat" => $request->alamat,
                "foto_toko" => $name,
                "kode_pos" => $request->kode_pos,
                "kota" => $request->kota,
                "kecamatan" => $request->kecamatan,
                "desa" => $request->desa,
                "deskripsi" => $request->deskripsi,
            ]);
        return redirect()->back();
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
