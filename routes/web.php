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
use App\Http\Controllers\KelolaTokoUserController;
use App\Http\Controllers\ProdukUserController;
use App\Http\Controllers\KategoriUserController;
use App\Http\Controllers\GerobakUserController;
use App\Http\Controllers\PemesananUserController;
use App\Http\Controllers\InvoiceController;

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
// ------------------------
// Customer Routes
// ------------------------
Route::get("/", [HomeController::class, "index"])->name("home");
Route::get("belanja", [BelanjaController::class, "index"]);
Route::get("belanja_kat/{id}", [BelanjaController::class, "barang_kat"]);
Route::get("produkdetail/{id}", [ProdukDetailController::class, "index"]);
Route::get("aboutus", [AboutController::class, "index"]);
Route::get("search", [BelanjaController::class, "search"])->name("search");
Route::get("profil_toko/{id}", [ProfilTokoController::class, "index"]);
Route::get("invoice_user/{id}", [InvoiceController::class, "index"]);

Route::group(["middleware" => ["auth"]], function () {
    Route::group(["middleware" => ["cek_login:pelanggan"]], function () {
        Route::post("add_cart", [CartController::class, "tambah_keranjang"]);
        Route::get("tampil_cart", [CartController::class, "index"]);
        Route::get("remove_cart/{id}", [CartController::class, "hapus"]);
        Route::get("remove_cartall/{id}", [
            CartController::class,
            "hapus_semua",
        ]);
        Route::post("update_cart/{id}", [CartController::class, "update"]);
        Route::get("/getKec", [ProfilController::class, "getKec"]);
        Route::get("/getDesa", [ProfilController::class, "getDesa"]);

        Route::get("profil", [ProfilController::class, "index"]);
        Route::post("batalkan_pesanan", [
            ProfilController::class,
            "batalPesanan",
        ]);

        Route::get("tanya_penjual", [
            ProfilTokoController::class,
            "tanya_penjual",
        ]);

        Route::get("barangtoko_kat/{id}", [
            ProfilTokoController::class,
            "barangtoko_kat",
        ]);

        Route::get("cari_brgtoko", [
            ProfilTokoController::class,
            "search",
        ])->name("search");

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

        Route::post("checkoutlangsung/barang", [
            CheckoutController::class,
            "checkoutlangsung",
        ]);

        Route::get("checkout/{id}", [CheckoutController::class, "index"]);
        Route::get("aftercheckout_tf/{id}", [
            CheckoutController::class,
            "aftercheckout_tf",
        ])->name("aftercheckout_tf");
        Route::post("upload/bukti/{id}", [
            CheckoutController::class,
            "upload_bukti",
        ]);
        Route::get("aftercheckout_cod/{id}", [
            CheckoutController::class,
            "aftercheckout_cod",
        ])->name("aftercheckout_cod");

        Route::get("batalkan_pesanan/{id}", [
            CheckoutController::class,
            "batalkanpesanan",
        ]);

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

        // ------------------------
        //Kelola Toko User Routes
        // ------------------------

        Route::get("kelola_toko", [KelolaTokoUserController::class, "index"]);

        Route::get("produk_user", [ProdukUserController::class, "index"])->name(
            "produk_user"
        );

        Route::get("cari_produk_user", [
            ProdukUserController::class,
            "cari_produk",
        ])->name("cari_produk_user");
        Route::get("tambah_produk_user", [
            ProdukUserController::class,
            "tambah_produk",
        ]);
        Route::post("proses_tambah_user", [
            ProdukUserController::class,
            "proses_tambah",
        ])->name("proses_tambah");
        Route::get("edit_produk_user/{id}", [
            ProdukUserController::class,
            "edit_produk",
        ]);
        Route::post("edit_produk_user/update/{id}", [
            ProdukUserController::class,
            "update",
        ]);
        Route::post("delete_produk_user/{id}", [
            ProdukUserController::class,
            "destroy",
        ]);
        //-----Filter----------------
        Route::get("produk_display", [
            ProdukUserController::class,
            "display",
        ])->name("produk_display");
        Route::get("produk_habis", [
            ProdukUserController::class,
            "habis",
        ])->name("produk_habis");
        Route::get("produk_hide", [ProdukUserController::class, "hide"])->name(
            "produk_hide"
        );
        //--------------------------------------

        Route::get("tambah_kategori_user", [
            KategoriUserController::class,
            "index",
        ])->name("tambah_kategori_user");
        Route::post("tambah_proses_user", [
            KategoriUserController::class,
            "tambah_proses",
        ])->name("tambah_proses_user");
        Route::get("kategori_user/{id}", [
            KategoriUserController::class,
            "tampil_kategori",
        ]);
        Route::get("kategori_usernew/{id}", [
            KategoriUserController::class,
            "tampil_kategorinew",
        ]);
        Route::post("edit_kategori_user/{id}", [
            KategoriUserController::class,
            "update_kategori",
        ])->name("edit_kategori_user");

        Route::get("gerobak_user", [GerobakUserController::class, "index"]);

        Route::post("checkout/barang", [
            CheckoutController::class,
            "proses_checkout",
        ]);
        Route::get("pemesanan_user", [PemesananUserController::class, "index"]);
        Route::get("pemesanan_detail_user/{id}", [
            PemesananUserController::class,
            "pemesanan_detail",
        ]);
        Route::get("konfirmasi_user/pesanan/{id}", [
            PemesananUserController::class,
            "konfirmasi_pesanan",
        ]);
        Route::get("filter_user/{id}", [
            PemesananUserController::class,
            "filter",
        ]);
        Route::get("edit_toko", [ProfilTokoController::class, "edit_toko"]);
        Route::post("update_toko/{id}", [
            ProfilTokoController::class,
            "update_toko",
        ]);
    });

    // ------------------------
    // Admin Routes
    // ------------------------

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

        Route::get("pemesanan", [PemesananController::class, "index"])->name(
            "pemesanan"
        );
        Route::get("pemesanan_detail/{id}", [
            PemesananController::class,
            "pemesanan_detail",
        ]);
        Route::get("invoice/{id}", [InvoiceController::class, "index"]);
        Route::get("konfirmasi/pesanan/{id}", [
            PemesananController::class,
            "konfirmasi_pesanan",
        ]);
        Route::get("filter/{id}", [PemesananController::class, "filter"]);

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
