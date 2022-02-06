@extends('marketplace.layout.layout_profil')


@section('content')

    <div id="page-content">
        <!--Page Title-->
        <div class="page section-header text-center">
            <div class="page-title">
                <div class="wrapper">
                    <h1 class="page-width">Profil</h1>
                </div>
            </div>
        </div>
        <!--End Page Title-->

        <div class="container">

            <div class="row billing-fields">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 sm-margin-30px-bottom">
                    <div class="create-ac-content bg-light-gray padding-20px-all">
                        <form>
                            <fieldset>
                                <h2 class="login-title mb-5 ">Profil</h2>
                                <div class="profile-photo mb-4">
                                    <img src="{{ asset('assets/marketplace/images/about2.jpg') }}" alt="">
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-lg-12 col-xl-12 required">
                                        <label for="input-name">Nama Lengkap </label>
                                        <input name="nama" value="" id="nama" type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-lg-12 col-xl-12 required">
                                        <label for="input-email">E-Mail </label>
                                        <input name="email" value="" id="input-email" type="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-lg-12 col-xl-12 required">
                                        <label for="input-nohp">No. Handphone</label>
                                        <input name="nohp" value="" id="input-nohp" type="nohp">
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="row">
                                    <div class="form-group col-md-12 col-lg-12 col-xl-12 required">
                                        <label for="input-address-1">Alamat </label>
                                        <textarea class="form-control resize-both" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-lg-12 col-xl-12 required">
                                        <label for="provinsi">Provinsi </label>
                                        <select name="country_id" id="input-country">
                                            <option value=""> --- Please Select --- </option>
                                            <option value="1">DKI Jakarta</option>
                                            <option value="2">Banten</option>
                                            <option value="3">Jawa Barat</option>
                                            <option value="4">Jawa Tengah</option>
                                            <option value="5">Jawa Timur</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-lg-12 col-xl-12 required">
                                        <label for="input-country">Kota </label>
                                        <select name="country_id" id="input-country">
                                            <option value=""> --- Please Select --- </option>
                                            <option value="1">Jakarta</option>
                                            <option value="2">Tangerang</option>
                                            <option value="3">Bandung</option>
                                            <option value="4">Semarang</option>
                                            <option value="5">Surabaya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-lg-12 col-xl-12 required">
                                        <label for="kodepos">Kode Pos </label>
                                        <input name="kodepos" value="" id="kodepos" type="text">
                                    </div>
                                </div>
                            </fieldset>

                            <div class="simpanProfile">
                                <div><input type="button" class="btn btn-secondary btn--small-profile"
                                        value="Simpan Profil "></div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                    <div class="your-order-payment">
                        <div class="tabs-listing">
                            <ul class="product-tabs">
                                <li rel="tab1"><a class="tablink">Daftar Alamat</a></li>
                                <li rel="tab2"><a class="tablink">Riwayat Transaksi</a></li>
                            </ul>
                            <div class="tab-container">
                                <div id="tab1" class="tab-content">
                                    <div class="row mb-3">
                                        <div class="col-md-5">
                                            <div class="input-group mb-3 border rounded-pill p-0">
                                                <input type="search" placeholder="Cari alamat atau nama penerima"
                                                    aria-describedby="button-addon3" class="form-control bg-none border-0">
                                                <div class="input-group-append border-0">
                                                    <button id="button-addon3" type="button" class="btn btn-link "><i
                                                            class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="spr-header clearfix mt">
                                                <div class="tambahalamat">
                                                    {{-- <span class="product-review"><a class="reviewLink"><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i> </a><span class="spr-summary-actions-togglereviews">Based on 6 reviews456</span></span> --}}
                                                    <span class="ta">
                                                        <a class="tambahalamat-btn" href="#" data-toggle="modal"
                                                            data-target="#tambah_alamat">Tambah Alamat Baru</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($utama as $u)
                                        <div class="card border-success mb-4">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col md-12 flex">
                                                        <i class="fas fa-map-marker-alt text-success mr-2"></i>
                                                        <h4 class="head-1 mr-2">Alamat</h4>
                                                        <h4 class="status">{{ $u->status }}</h4>
                                                    </div>
                                                </div>
                                                <div class="penerima">
                                                    <h4 class="nama-penerima">{{ $u->nama_penerima }}</h4>
                                                    <h4 class="no-hp">{{ $u->phone }}</h4>
                                                    <h4 class="alamat">{{ $u->alamat }}, {{ $u->nama_desa }},
                                                        {{ $u->nama_kecamatan }}, {{ $u->nama_kota }}
                                                        {{ $u->kode_pos }}
                                                    </h4>
                                                    <h4 class="no-hp">{{ $u->catatan }}</h4>
                                                </div>
                                                <div class="tombol text-left mt-4 mr-5">
                                                    <a data-toggle="modal" data-target="#ubah_alamat_utama" href="#"
                                                        class="detail-transaksi mr-3">Ubah Alamat</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @foreach ($profil as $p)
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col md-12 flex">
                                                        <i class="fas fa-map-marker-alt text-success mr-2"></i>
                                                        <h4 class="head-1 mr-5">Alamat</h4>
                                                    </div>
                                                </div>
                                                <div class="penerima">
                                                    <h4 class="nama-penerima">{{ $p->nama_penerima }}</h4>
                                                    <h4 class="no-hp">{{ $p->phone }}</h4>
                                                    <h4 class="alamat">{{ $p->alamat }}, {{ $p->nama_desa }},
                                                        {{ $p->nama_kecamatan }}, {{ $p->nama_kota }}
                                                        {{ $p->kode_pos }}
                                                    </h4>
                                                    <h4 class="no-hp">{{ $p->catatan }}</h4>
                                                </div>
                                                <div class="tombol text-left mt-4 mr-5">
                                                    <a data-toggle="modal"
                                                        data-target="#ubah_alamat{{ $p->id_user_detail }}" href="#"
                                                        class="detail-transaksi mr-3">Ubah Alamat</a> &nbsp; | &nbsp;
                                                    <a href="{{ url('alamat_utama', $p->id_user_detail) }}"
                                                        class="detail-transaksi mr-3">Jadikan Alamat Utama</a> &nbsp; |
                                                    &nbsp;
                                                    <a href="{{ url('hapus_alamat', $p->id_user_detail) }}"
                                                        class="detail-transaksi mr-3">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div id="tab2" class="tab-content">
                                    <div class="filters-toolbar-wrapper">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="input-group mb-3 border rounded-pill p-0">
                                                    <input type="search" placeholder="Cari transaksimu disini"
                                                        aria-describedby="button-addon3"
                                                        class="form-control bg-none border-0">
                                                    <div class="input-group-append border-0">
                                                        <button id="button-addon3" type="button" class="btn btn-link "><i
                                                                class="fa fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3 col-md-3 col-lg-3 text-left ml-2 ">
                                                <div class="filters-toolbar__item mt-1">
                                                    <label for="SortBy" class="hidden">Status</label>
                                                    <select name="SortBy" id="SortBy"
                                                        class="filters-toolbar__input filters-toolbar__input--sort">
                                                        <option value="title-ascending" selected="selected">Semua
                                                        </option>
                                                        <option>Menunggu Konfirmasi</option>
                                                        <option>Diproses</option>
                                                        <option>Dikirim</option>
                                                        <option>Berhasil</option>
                                                    </select>
                                                    <input class="collection-header__default-sort" type="hidden"
                                                        value="manual">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="datepicker date input-group p-0 shadow-sm">
                                                    <input type="date" placeholder="Choose a reservation date"
                                                        class="form-control py-4 px-4" id="reservationDate">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col md-12 flex">
                                                    <i class="fa fa-shopping-bag text-success mr-2"></i>
                                                    <h4 class="head-1 mr-5">Belanja</h4>
                                                    <h4 class="date mr-5">16 Januari 2022</h4>
                                                    <h4 class="status mr-5">Selesai</h4>
                                                    <h4 class="invoice">BP00001</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img class="img-produk"
                                                        src="{{ asset('assets/marketplace/images/product-images/indomie.jpg') }}"
                                                        alt="produk">
                                                </div>
                                                <div class="col-md-7 mt-3">
                                                    <div class="product-detail">
                                                        <a class="nama-produk"
                                                            href="{{ url('produkdetail') }}">Indomie Goreng Jumbo ( 1
                                                            Karton )</a>
                                                        <p class="head-detail">Detail Produk :</p>
                                                        <p class="isi">1 Karton / 48 Pcs</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mt-3">
                                                    <div class="total-belanja">
                                                        <h4>Total Belanja</h4>
                                                        <h3>Rp.112.000</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tombol text-right">
                                                <a href="#" class="detail-transaksi mr-3" data-toggle="modal"
                                                    data-target="#detail">Lihat Detail Transaksi</a>
                                                <a href="#" class="beli-lagi">Beli Lagi</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col md-12 flex">
                                                    <i class="fa fa-shopping-bag text-success mr-2"></i>
                                                    <h4 class="head-1 mr-5">Belanja</h4>
                                                    <h4 class="date mr-5">16 Januari 2022</h4>
                                                    <h4 class="status-2 mr-5">Diproses</h4>
                                                    <h4 class="invoice">BP00002</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img class="img-produk"
                                                        src="{{ asset('assets/marketplace/images/product-images/indomie.jpg') }}"
                                                        alt="produk">
                                                </div>
                                                <div class="col-md-7 mt-3">
                                                    <div class="product-detail">
                                                        <a class="nama-produk"
                                                            href="{{ url('produkdetail') }}">Indomie Goreng Jumbo ( 1
                                                            Karton )</a>
                                                        <p class="head-detail">Detail Produk :</p>
                                                        <p class="isi">1 Karton / 48 Pcs</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mt-3">
                                                    <div class="total-belanja">
                                                        <h4>Total Belanja</h4>
                                                        <h3>Rp.106.000</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tombol text-right">
                                                <a href="#" class="detail-transaksi mr-3">Lihat Detail Transaksi</a>
                                                <a href="#" class="beli-lagi">Beli Lagi</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col md-12 flex">
                                                    <i class="fa fa-shopping-bag text-success mr-2"></i>
                                                    <h4 class="head-1 mr-5">Belanja</h4>
                                                    <h4 class="date mr-5">16 Januari 2022</h4>
                                                    <h4 class="status-3 mr-5">Dikirim</h4>
                                                    <h4 class="invoice">BP00003</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img class="img-produk"
                                                        src="{{ asset('assets/marketplace/images/product-images/indomie.jpg') }}"
                                                        alt="produk">
                                                </div>
                                                <div class="col-md-7 mt-3">
                                                    <div class="product-detail">
                                                        <a class="nama-produk"
                                                            href="{{ url('produkdetail') }}">Indomie Goreng Jumbo ( 1
                                                            Karton )</a>
                                                        <p class="head-detail">Detail Produk :</p>
                                                        <p class="isi">1 Karton / 48 Pcs</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mt-3">
                                                    <div class="total-belanja">
                                                        <h4>Total Belanja</h4>
                                                        <h3>Rp.106.000</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tombol text-right">
                                                <a href="#" class="detail-transaksi mr-3">Lihat Detail Transaksi</a>
                                                <a href="#" class="beli-lagi">Beli Lagi</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col md-12 flex">
                                                    <i class="fa fa-shopping-bag text-success mr-2"></i>
                                                    <h4 class="head-1 mr-5">Belanja</h4>
                                                    <h4 class="date mr-5">16 Januari 2022</h4>
                                                    <h4 class="status-4 mr-5">Tidak Berhasil</h4>
                                                    <h4 class="invoice">BP00004</h4>
                                                </div>
                                            </div>
                                            <div class="peringatan mt-3 mb-3 text-center">
                                                <h4 class="text-peringatan"><span><i
                                                            class="fa fa-credit-card-alt mr-3"></i></span> Anda belum
                                                    membayar sebelum waktu yang sudah ditentukan!</h4>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img class="img-produk"
                                                        src="{{ asset('assets/marketplace/images/product-images/indomiesoto.jpg') }}"
                                                        alt="produk">
                                                </div>
                                                <div class="col-md-7 mt-3">
                                                    <div class="product-detail">
                                                        <a class="nama-produk"
                                                            href="{{ url('produkdetail') }}">Indomie Soto Mie ( 1
                                                            Karton )</a>
                                                        <p class="head-detail">Detail Produk :</p>
                                                        <p class="isi">1 Karton / 48 Pcs</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mt-3">
                                                    <div class="total-belanja">
                                                        <h4>Total Belanja</h4>
                                                        <h3>Rp.105.000</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tombol text-right ">
                                                <a href="#" class="detail-transaksi mr-3" data-toggle="modal"
                                                    data-target="#detail">Lihat Detail Transaksi</a>
                                                <a href="#" class="beli-lagi">Beli Lagi</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="detail" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="title-modal-detail">Lihat Detail Transaksi</h4>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="detail-status">
                                                        <div class="card mb-4">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="header-modal col md-12 flex">
                                                                        <i
                                                                            class="fa fa-shopping-bag text-success mr-2"></i>
                                                                        <h4 class="head-1 mr-5">Belanja</h4>
                                                                        <h4 class="date mr-5">16 Januari 2022</h4>
                                                                        <h4 class="date mr-2">INV :</h4>
                                                                        <a class="inv_d" href="#">BP00001</a>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <img class="img-produk"
                                                                            src="{{ asset('assets/marketplace/images/product-images/indomie.jpg') }}"
                                                                            alt="produk">
                                                                    </div>
                                                                    <div class="col-md-7 mt-3">
                                                                        <div class="product-detail">
                                                                            <a class="nama-produk-modal"
                                                                                href="{{ url('produkdetail') }}">Indomie
                                                                                Goreng Jumbo ( 1 Karton )</a>
                                                                            <p class="head-detail-modal">Detail Produk
                                                                                :</p>
                                                                            <p class="isi">1 Karton / 48 Pcs
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 mt-3">
                                                                        <div class="total-belanja-modal">
                                                                            <h4>Total Harga</h4>
                                                                            <h3>Rp.106.000</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tombol text-right ">
                                                                    <a href="#" class="beli-lagi mt-4">Beli Lagi</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info-pengiriman">
                                                        <div class="info-header d-flex">
                                                            <i class="fa fa-list-alt text-success mt-1 mr-3"></i>
                                                            <h4 class="info-header-text">Info Pengiriman</h4>
                                                        </div>
                                                        <div class="info-shipping d-flex">
                                                            <p class="shipping-title1">Kurir</p><span>:</span>
                                                            <div class="shipping-content">
                                                                <p>J&T - Express</p>
                                                            </div>
                                                        </div>
                                                        <div class="info-shipping d-flex">
                                                            <p class="shipping-title">No Resi</p><span>:</span>
                                                            <div class="shipping-content">
                                                                <p>10001217095726</p>
                                                            </div>
                                                        </div>
                                                        <div class="info-shipping d-flex">
                                                            <p class="shipping-title">Alamat</p><span>:</span>
                                                            <div class="shipping-content">
                                                                <p>
                                                                    Oska Aditya
                                                                    <br>
                                                                    083833833833
                                                                    <br>
                                                                    Jl. Cipunegara, Kec. Kepanjenkidul, Kota Blitar,
                                                                    Jawa Timur
                                                                    <br>
                                                                    Kepanjen Kidul, Kota Blitar
                                                                    <br>
                                                                    Jawa Timur, 66115
                                                                <p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="info-payment pb-5">
                                                        <div class="info-header d-flex">
                                                            <i class="fa fa-list-alt text-success mt-1 mr-3"></i>
                                                            <h4 class="info-header-text">Info Payment</h4>
                                                        </div>
                                                        <div class="payment-method mt-3">
                                                            <div class="payment-content">
                                                                <span class="method">Metode
                                                                    Pembayaran</span><span
                                                                    class="value">VA-BCA</span>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="dash mt-3 mr-3"></div>
                                                        <div class="payment-method mt-3">
                                                            <div class="payment-content">
                                                                <span class="method">Total Harga</span><span
                                                                    class="value">Rp.106.000</span>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="payment-method mt-3">
                                                            <div class="payment-content">
                                                                <span class="method">Total Ongkir</span><span
                                                                    class="value">Rp.6.000</span>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="dash mt-3 mr-3"></div>
                                                        <div class="payment-total mt-3">
                                                            <div class="payment-content">
                                                                <span class="method">Total Belanja</span><span
                                                                    class="value">Rp.112.000</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--tambah popup-->
            <div class="modal fade quick-view-popup" id="tambah_alamat">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="product-template__container prstyle1 p-3">
                                <a href="javascript:void()" data-dismiss="modal" class="model-close-btn pull-right"
                                    title="close"><span class="icon icon anm anm-times-l"></span></a>
                                <form action="{{ url('tambah_alamat') }}" method="POST">
                                    @csrf
                                    <fieldset>
                                        <h2 class="login-title mb-3">Tambah Alamat</h2>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-lg-12 col-xl-12 required">
                                                <label for="input-firstname">Nama Penerima<span
                                                        class="required-f">*</span></label>
                                                <input name="nama_penerima" value="" id="input-firstname" type="text">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-telephone">Telephone <span
                                                        class="required-f">*</span></label>
                                                <input name="phone" value="" id="input-telephone" type="text">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-email">Alamat <span
                                                        class="required-f">*</span></label>
                                                <input name="alamat" value="" id="input-email" type="text">
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 d-flex flex-column">
                                                <label for="address_country">Kabupaten/Kota</label>
                                                <select name="kota" id="kota" class="js-example-basic-single"
                                                    style="width: 100%;" data-show-subtext="true" data-live-search="true">
                                                    <option value="">== Pilih Kota/Kabupaten ==</option>
                                                    @foreach ($kota as $ko)
                                                        <option value="{{ $ko->id_kota }}">{{ $ko->nama_kota }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 d-flex flex-column">
                                                <label>Kecamatan</label>
                                                <select id="kecamatan" name="kecamatan">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 d-flex flex-column">
                                                <label>Kelurahan/Desa</label>
                                                <select id="desa" name="desa" data-default="">

                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-email">Kodeposss<span
                                                        class="required-f">*</span></label>
                                                <input name="kode_pos" value="" id="input-email" type="text">
                                            </div>
                                        </div>
                                        <fieldset>
                                            <div class="row">
                                                <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                                    <label for="input-company">Catatan Untuk Kurir (optional)</label>
                                                    <textarea class="form-control resize-both" name="catatan"
                                                        rows="3"></textarea>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="text-right">
                                            <button type="submit" class="btn mb-3">Simpan</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--edit utama popup-->
        <div class="modal fade quick-view-popup" id="ubah_alamat_utama">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="product-template__container prstyle1 p-3">
                            <a href="javascript:void()" data-dismiss="modal" class="model-close-btn pull-right"
                                title="close"><span class="icon icon anm anm-times-l"></span></a>
                            @foreach ($utama as $u)
                                <form action="{{ url('update_alamat', $u->id_user_detail) }}" method="POST">
                                    @csrf
                                    <fieldset>
                                        <h2 class="login-title mb-3">Edit Alamat</h2>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-lg-12 col-xl-12 required">
                                                <label for="input-firstname">Nama Penerima<span
                                                        class="required-f">*</span></label>
                                                <input name="nama_penerima" value="{{ $u->nama_penerima }}"
                                                    id="input-firstname" type="text">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-telephone">Telephone <span
                                                        class="required-f">*</span></label>
                                                <input name="phone" value="{{ $u->phone }}" id="input-telephone"
                                                    type="text">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-email">Alamat <span
                                                        class="required-f">*</span></label>
                                                <input name="alamat" value="{{ $u->alamat }}" id="input-email"
                                                    type="text">
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 d-flex flex-column">
                                                <label for="address_country">Kabupaten/Kota</label>
                                                <select name="kota" id="kota" class="js-example-basic-single"
                                                    style="width: 100%;" data-show-subtext="true" data-live-search="true">
                                                    <option value="">== Pilih Kota/Kabupaten ==</option>
                                                    @foreach ($kota as $ko)
                                                        <option value="{{ $ko->id }}">{{ $ko->nama_kota }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 d-flex flex-column">
                                                <label>Kecamatan</label>
                                                <select id="kecamatan" name="kecamatan">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 d-flex flex-column">
                                                <label>Kelurahan/Desa</label>
                                                <select id="desa" name="desa" data-default="">

                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-email">Kodepos<span
                                                        class="required-f">*</span></label>
                                                <input name="kode_pos" value="{{ $u->kode_pos }}" id="input-email"
                                                    type="text">
                                            </div>
                                        </div>
                                        <fieldset>
                                            <div class="row">
                                                <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                                    <label for="input-company">Catatan Untuk Kurir (optional)</label>
                                                    <textarea class="form-control resize-both" name="catatan"
                                                        rows="3">{{ $u->catatan }}</textarea>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="text-right">
                                            <button type="submit" class="btn mb-3">Simpan</button>
                                        </div>
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--edit biasa popuuup-->
        @foreach ($profil as $p)
            <div class="modal fade quick-view-popup" id="ubah_alamat{{ $p->id_user_detail }}">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="product-template__container prstyle1 p-3">
                                <a href="javascript:void()" data-dismiss="modal" class="model-close-btn pull-right"
                                    title="close"><span class="icon icon anm anm-times-l"></span></a>

                                <form action="{{ url('update_alamat', $p->id_user_detail) }}" method="POST">
                                    @csrf
                                    <fieldset>
                                        <h2 class="login-title mb-3">Edit Alamat</h2>
                                        <div class="row">
                                            <div class="form-group col-md-12 col-lg-12 col-xl-12 required">
                                                <label for="input-firstname">Nama Penerima<span
                                                        class="required-f">*</span></label>
                                                <input name="nama_penerima" value="{{ $p->nama_penerima }}"
                                                    id="input-firstname" type="text">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-telephone">Telephone <span
                                                        class="required-f">*</span></label>
                                                <input name="phone" value="{{ $p->phone }}" id="input-telephone"
                                                    type="text">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-email">Alamat <span
                                                        class="required-f">*</span></label>
                                                <input name="alamat" value="{{ $p->alamat }}" id="input-email"
                                                    type="text">
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 d-flex flex-column">
                                                <label for="address_country">Kabupaten/Kota</label>
                                                <select name="kota" id="kota" class="js-example-basic-single"
                                                    style="width: 100%;" data-show-subtext="true" data-live-search="true">
                                                    <option value="">== Pilih Kota/Kabupaten ==</option>
                                                    @foreach ($kota as $ko)
                                                        <option value="{{ $ko->id_kota }}">{{ $ko->nama_kota }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 d-flex flex-column">
                                                <label>Kecamatan</label>
                                                <select id="kecamatan" name="kecamatan">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 d-flex flex-column">
                                                <label>Kelurahan/Desa</label>
                                                <select id="desa" name="desa" data-default="">

                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                <label for="input-email">Kodepos<span
                                                        class="required-f">*</span></label>
                                                <input name="kode_pos" value="{{ $p->kode_pos }}" id="input-email"
                                                    type="text">
                                            </div>
                                        </div>
                                        <fieldset>
                                            <div class="row">
                                                <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                                    <label for="input-company">Catatan Untuk Kurir (optional)</label>
                                                    <textarea class="form-control resize-both" name="catatan"
                                                        rows="3">{{ $p->catatan }}</textarea>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="text-right">
                                            <button type="submit" class="btn mb-3">Simpan</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    @endsection

    @section('js')
        <script type="text/javascript">
            $(document).ready(function() {
                $(".js-example-basic-single").select2();
            });
        </script>

        <script>
            $('#kota').change(function() {
                var koID = $(this).val();
                if (koID) {
                    $.ajax({
                        type: "GET",
                        url: "getKec?id_kota=" + koID,
                        dataType: 'JSON',
                        success: function(res) {
                            if (res) {
                                $("#kecamatan").empty();
                                $("#kecamatan").append('<option>---Pilih Kecamatan---</option>');
                                $.each(res, function(nama, kode) {
                                    $("#kecamatan").append('<option value="' + kode + '">' + nama +
                                        '</option>');
                                });
                            } else {
                                $("#kecamatan").empty();
                            }
                        }
                    });
                } else {
                    $("#kecamatan").empty();
                }
            });
            $('#kecamatan').change(function() {
                var kecID = $(this).val();
                if (kecID) {
                    $.ajax({
                        type: "GET",
                        url: "getDesa?id_kecamatan=" + kecID,
                        dataType: 'JSON',
                        success: function(res) {
                            if (res) {
                                $("#desa").empty();
                                $("#desa").append('<option>---Pilih Kelurahan/Desa---</option>');
                                $.each(res, function(nama, kode) {
                                    $("#desa").append('<option value="' + kode + '">' + nama +
                                        '</option>');
                                });
                            } else {
                                $("#desa").empty();
                            }
                        }
                    });
                } else {
                    $("#desa").empty();
                }
            });
        </script>
    @endsection
