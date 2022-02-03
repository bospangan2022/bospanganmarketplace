<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('marketplace.login');
    }

    public function login_admin()
    {
        return view('login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function proses_login(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 'pelanggan') {
                return redirect()->intended('/');
            } else if ($user->role == 'admin') {
                return redirect()->intended('dashboard');
            }
            return redirect('login');
        }
        return redirect('login')->withSuccess('Opps! Silahkan Cek Inputanmu');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
    }

    public function register(Request $request)
    {
        return view('marketplace.register');
    }

    public function proses_registrasi(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'no_hp' => 'required',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request->nama,
            'no_hp' => $request->no_hp,
            'role' => $request->role,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
        ]);

        return redirect()->route('login');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['nama'],
            'email' => $data['email'],
            'no_hp' => $data['no_hp'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);
    }
}
