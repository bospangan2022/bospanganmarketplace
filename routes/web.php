<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BelanjaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\GerobakController;
use App\Http\Controllers\FixedorderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukDetailController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfilTokoController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TokoAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth Routes
Route::get("login", "App\Http\Controllers\AuthController@index")->name("login");
Route::get(
    "login_admin",
    "App\Http\Controllers\AuthController@login_admin"
)->name("login_admin");
Route::post(
    "proses_login",
    "App\Http\Controllers\AuthController@proses_login"
)->name("proses_login");
Route::get("register", "App\Http\Controllers\AuthController@register")->name(
    "register"
);
Route::post(
    "proses_registrasi",
    "App\Http\Controllers\AuthController@proses_registrasi"
)->name("proses_registrasi");
Route::get("logout", "App\Http\Controllers\AuthController@logout")->name(
    "logout"
);

// Customer Routes
Route::get("/", [HomeController::class, "index"])->name("kategori");
Route::get("belanja", [BelanjaController::class, "index"]);
Route::get("belanja_kat/{id}", [BelanjaController::class, "barang_kat"]);
Route::get("produkdetail/{id}", [ProdukDetailController::class, "index"]);
Route::get("aboutus", [AboutController::class, "index"]);
Route::get("search", [BelanjaController::class, "search"])->name("search");

Route::group(["middleware" => ["auth"]], function () {
    Route::group(["middleware" => ["cek_login:pelanggan"]], function () {
        Route::post("add_cart", [CartController::class, "tambah_keranjang"]);
        Route::get("tampil_cart", [CartController::class, "index"]);
        Route::get("remove_cart/{id}", [CartController::class, "hapus"]);
        Route::get("remove_cartall", [CartController::class, "hapus_semua"]);
        Route::post("update_cart/{id}", [CartController::class, "update"]);
        Route::get("/getKec", [CartController::class, "getKec"]);
        Route::get("/getDesa", [CartController::class, "getDesa"]);

        Route::get("profil", [ProfilController::class, "index"]);
        Route::get("profil_toko/{id}", [ProfilTokoController::class, "index"]);

        Route::post("tambah_alamat", [
            ProfilController::class,
            "tambah_alamat",
        ]);
        Route::get("hapus_alamat/{id}", [
            ProfilController::class,
            "hapus_alamat",
        ]);
        Route::post("update_alamat/{id}", [
            ProfilController::class,
            "update_alamat",
        ]);
        Route::get("alamat_utama/{id}", [
            ProfilController::class,
            "alamat_utama",
        ]);

        Route::post("checkoutperitem/{id}", [
            CheckoutController::class,
            "checkoutperitem",
        ]);
        Route::get("checkout", [CheckoutController::class, "index"]);

        Route::get("wishlist", [WishlistController::class, "index"]);
        Route::post("add_wishlist", [
            WishlistController::class,
            "add_wishlist",
        ]);
        Route::post("delete_wishlist/{id}", [
            WishlistController::class,
            "destroy",
        ]);
        Route::get("wishlist", [WishlistController::class, "index"]);

        Route::get("buka_toko", [StoreController::class, "index"]);
        Route::post("tambah_toko", [StoreController::class, "tambah_toko"]);
    });

    // Admin Routes
    Route::group(["middleware" => ["cek_login:admin"]], function () {
        Route::get("dashboard", [AuthController::class, "dashboard"]);
        Route::get("produk", [ProdukController::class, "index"])->name(
            "produk"
        );
        Route::get("cari_produk", [
            ProdukController::class,
            "cari_produk",
        ])->name("cari_produk");
        Route::get("tambah_produk", [ProdukController::class, "tambah_produk"]);
        Route::post("proses_tambah", [
            ProdukController::class,
            "proses_tambah",
        ])->name("proses_tambah");
        Route::get("edit_produk/{id}", [
            ProdukController::class,
            "edit_produk",
        ]);
        Route::post("edit_produk/update/{id}", [
            ProdukController::class,
            "update",
        ]);
        Route::post("delete_produk/{id}", [ProdukController::class, "destroy"]);

        Route::get("kategori/{id}", [
            KategoriController::class,
            "tampil_kategori",
        ]);
        Route::get("tambah_kategori", [
            KategoriController::class,
            "index",
        ])->name("tambah_kategori");
        Route::post("tambah_proses", [
            KategoriController::class,
            "tambah_proses",
        ])->name("tambah_proses");
        Route::post("edit_kategori/{id}", [
            KategoriController::class,
            "edit_kategori",
        ])->name("edit_kategori");
        Route::get("hapus_kategori/{id}", [KategoriController::class, "hapus"]);
        Route::get("kategori_produk/{id}", [
            KategoriController::class,
            "kategori_produk",
        ]);
        Route::get("hapus_kategoriProduk/{id}", [
            KategoriController::class,
            "hapus_kategoriProduk",
        ]);
        Route::get("tetapkan_kategori/{id}", [
            KategoriController::class,
            "tetapkan_kategori",
        ]);

        Route::get("pelanggan", [PelangganController::class, "index"]);

        Route::get("pemesanan", [PemesananController::class, "index"]);
        Route::get("pemesanan_detail", [
            PemesananController::class,
            "pemesanan_detail",
        ]);

        Route::get("gerobak", [GerobakController::class, "index"]);
        Route::post("hapus_gerobak/{id}", [
            GerobakController::class,
            "destroy",
        ]);
        Route::get("cari_gerobak", [
            GerobakController::class,
            "cari_gerobak",
        ])->name("cari_gerobak");

        Route::get("fixedorder", [FixedorderController::class, "index"]);
        Route::get("fixedorder_detail", [
            FixedorderController::class,
            "fixedorder_detail",
        ]);
        Route::get("edit_detail", [FixedorderController::class, "edit_detail"]);
        Route::get("buat_pesanan", [
            FixedorderController::class,
            "buat_pesanan",
        ]);
        Route::get("toko", [TokoAdminController::class, "index"]);
        Route::get("update_status/{id}", [
            TokoAdminController::class,
            "update",
        ]);
    });
});

Route::group(["middleware" => ["auth"]], function () {});
