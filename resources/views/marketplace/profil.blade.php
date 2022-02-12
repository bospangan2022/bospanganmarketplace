<?php
use Illuminate\Support\Facades\DB;
?>
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
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 sm-margin-30px-bottom">
                    @foreach ($utama as $u)
                        <div class="profil-card card">
                            <div class="profil-row row">
                                <div class="profil_pp col-md-2 col-sm-4">
                                    <img class="profil_img" src="{{ asset('/images/post/01.jpg') }}" alt="">
                                </div>
                                <div class="dtl-user col-md-9 col-sm-8">
                                    <p class="nm_user">{{ Auth::user()->name }}</p>
                                    <div class="kota_user d-flex">
                                        <i class="fas fa-map-marker-alt text-success mr-2"></i>
                                        <p class="kota_u">{{ $u->nama_kota }}</p>
                                    </div>
                                </div>
                            </div>
                            {{-- Mobile Profile Card --}}
                            <div class="profil-row-mobile row ">
                                <div class="col-md-1">
                                    <div class="profil_pp col-md-12 d-flex">
                                        <img class="profil_img" src="{{ asset('/images/post/01.jpg') }}" alt="">
                                        <div class="dtl-user-mbl">
                                            <p class="nm_user">{{ Auth::user()->name }}</p>
                                            <div class="kota-mobile d-flex ">
                                                <i class="fas fa-map-marker-alt text-success mr-2"></i>
                                                <p class="kota_u">{{ $u->nama_kota }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Profil Detail --}}
                            <div class="dt">
                                <table class="table-borderless ms-5 mb-5">
                                    <tbody>
                                        <tr>
                                            <td class="t_dt col-1">
                                                <span class="prf_dt">Email</span>
                                            </td>
                                            <td class="t_dt col-1">
                                                <span class="prf_dt">:</span>
                                            </td>
                                            <td class="t_dt">
                                                <span class="prf_dt">{{ Auth::user()->email }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-3">
                                                <span class="prf_dt">No Hp</span>
                                            </td>
                                            <td class="col-1">
                                                <span class="prf_dt">:</span>
                                            </td>
                                            <td>
                                                <span class="prf_dt">{{ Auth::user()->no_hp }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-3">
                                                <span class="prf_dt">Alamat</span>
                                            </td>
                                            <td class="col-1">
                                                <span class="prf_dt">:</span>
                                            </td>
                                            <td>
                                                <span class="prf_dt">{{ $u->alamat }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>


                        </div>
                    @endforeach
                </div>

                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
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
                                                        class="detail-transaksi ">Ubah Alamat</a> &nbsp; | &nbsp;
                                                    <a href="{{ url('alamat_utama', $p->id_user_detail) }}"
                                                        class="detail-transaksi ">Jadikan Alamat Utama</a> &nbsp; |
                                                    &nbsp;
                                                    <a href="{{ url('hapus_alamat', $p->id_user_detail) }}"
                                                        class="detail-transaksi ">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div id="tab2" class="tab-content">
                                    <div class="filters-toolbar-wrapper">
                                        <div class="riwayat-transaksi row">
                                            <div class="col md-3">
                                                <div class="status-riwayat text-center">
                                                    <a href=""><i class="status_ic fas fa-wallet fa-3x"></i>
                                                        <span id="CartCount" class="site-header__status-ic"
                                                            data-cart-render="item_count">{{ $belum_dibayar }}</span>
                                                    </a>
                                                    <br>
                                                    <a class="text_status" href="">Belum Dibayar / Belum Dikonfirmasi</a>
                                                </div>
                                            </div>
                                            <div class="col md-3">
                                                <div class="status-riwayat text-center">
                                                    <a href=""><i class="status_ic fas fa-archive fa-3x"></i>
                                                        <span id="CartCount" class="site-header__status-ic"
                                                            data-cart-render="item_count">{{ $dikemas }}</span>
                                                    </a>
                                                    <br>
                                                    <a class="text_status" href="">Dikemas</a>
                                                </div>
                                            </div>
                                            <div class="col md-3">
                                                <div class="status-riwayat text-center">
                                                    <a href=""><i class="status_ic fas fa-shipping-fast fa-3x"></i>
                                                        <span id="CartCount" class="site-header__status-ic"
                                                            data-cart-render="item_count">{{ $dikirim }}</span>
                                                    </a>
                                                    <br>
                                                    <a class="text_status" href="">Dikirim</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($checkout as $check)
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col md-12 flex">
                                                        <i class="fa fa-shopping-bag text-success mr-2"></i>
                                                        <h4 class="head-1 mr-5">Belanja</h4>
                                                        <h4 class="tgl-tr mr-5">{{ $check->tanggal }}</h4>
                                                        <?php
                                                        if($check->status == "belumdibayar"){
                                                        ?>
                                                        <h4 class="status-4 mr-3">Belum Dibayar / Dikonfirmasi</h4>
                                                        <?php }elseif($check->status == "dikemas"){ ?>
                                                        <h4 class="status-2 mr-3">Dikemas</h4>
                                                        <?php }elseif($check->status == "dikirim"){ ?>
                                                        <h4 class="status-3 mr-3">Dikirim</h4>
                                                        <?php }elseif($check->status == "selesai"){ ?>
                                                        <h4 class="status mr-3">Selesai</h4>
                                                        <?php } ?>
                                                        <h4 class="invoice">{{ $check->id_checkout }}</h4>
                                                    </div>
                                                </div>
                                                <?php
                                                $pertama = DB::table('tb_detail_checkout')
                                                    ->join('tb_keranjang', 'tb_detail_checkout.id_keranjang', '=', 'tb_keranjang.id_keranjang')
                                                    ->join('tb_barang', 'tb_keranjang.id_barang', '=', 'tb_barang.id_barang')
                                                    ->join('tb_toko', 'tb_keranjang.id_toko', '=', 'tb_toko.id_toko')
                                                    ->where('id_checkout', $check->id_checkout)
                                                    ->orderByDesc('id_detail_checkout')
                                                    ->limit(1)
                                                    ->get();
                                                //dd($pertama);
                                                ?>
                                                @foreach ($pertama as $ut)
                                                    <div class="row">
                                                        <div class="col-md-2 mt-3 text-center">
                                                            <img class="img-produk"
                                                                src="/images/post/{{ $ut->foto }}" alt="produk">
                                                        </div>
                                                        <div class="col-md-7 mt-3">
                                                            <div class="product-detail">
                                                                <a class="nama-produk"
                                                                    href="{{ url('produkdetail') }}">{{ $ut->nama_barang }}</a>
                                                                <p class="head-detail">Nama Toko :</p>
                                                                <p class="isi"><a
                                                                        href="{{ url('profil_toko', $ut->nama_toko) }}">{{ $ut->nama_toko }}</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-3">
                                                            <div class="total-belanja">
                                                                <h4>Total Belanja</h4>
                                                                <h3>@currency($check->subtotal)</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tombol text-right">
                                                        <a href="#" class="detail-transaksi mr-3" data-toggle="modal"
                                                            data-target="#detail{{ $check->id_checkout }}">Lihat Detail
                                                            Transaksi</a>
                                                        <?php
                                                        if ($check->status == 'belumdibayar') {
                                                        ?>
                                                        <a href="#" data-toggle="modal" data-target="#batalkanPesanan"
                                                            class="beli-lagi">Batalkan
                                                            Pesanan</a>
                                                        <?php } else { ?>
                                                        <?php } ?>
                                                    </div>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="batalkanPesanan" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="body-batal modal-body">
                                                                    <div class="ic-cancel text-center">
                                                                        <i class="fas fa-times-circle fa-6x"></i>
                                                                    </div>
                                                                    <div class="txt_cancel text-center">
                                                                        <h4 class="ttl-batal">
                                                                            Apakah anda yakin untuk membatalkan pesanan anda
                                                                            ?
                                                                        </h4>
                                                                    </div>
                                                                    <div class="tbl-yt">
                                                                        <a class="btl-ya" href="#"
                                                                            data-toggle="collapse" aria-expanded="false"
                                                                            data-target="#alasanBatal">Ya</a>
                                                                        <a class="btl-tidak" data-dismiss="modal"
                                                                            href="#">Tidak</a>
                                                                    </div>
                                                                    <div class="collapse bg-none text-center"
                                                                        id="alasanBatal">
                                                                        <div class="alasann">
                                                                            <h4 class="ttl-alasan">Alasan Pesanan
                                                                                Dibatalkan ?</h4>
                                                                            <form action={{ url('batalkan_pesanan') }}
                                                                                method="POST">
                                                                                @csrf
                                                                                <textarea class="form-control resize-both"
                                                                                    name="alasan"></textarea>
                                                                                <div class="tbl-fix">
                                                                                    <input type="hidden" name="id_checkout"
                                                                                        value="{{ $ut->id_checkout }}">
                                                                                    <button class="btl-fix"
                                                                                        type="submit">Batalkan
                                                                                        Pesanan</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                        Modal title</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    ...
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                    @foreach ($checkout as $check)
                                        <div class="modal fade" id="detail{{ $check->id_checkout }}" role="dialog">
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
                                                                            <h4 class="date mr-5">
                                                                                {{ $check->tanggal }}</h4>
                                                                            <h4 class="date mr-2">INV :</h4>
                                                                            <a class="inv_d"
                                                                                href="#">{{ $check->id_checkout }}</a>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                    $detail = DB::table('tb_detail_checkout')
                                                                        ->join('tb_keranjang', 'tb_detail_checkout.id_keranjang', '=', 'tb_keranjang.id_keranjang')
                                                                        ->join('tb_barang', 'tb_keranjang.id_barang', '=', 'tb_barang.id_barang')
                                                                        ->join('tb_toko', 'tb_keranjang.id_toko', '=', 'tb_toko.id_toko')
                                                                        ->where('id_checkout', $check->id_checkout)
                                                                        ->orderBy('id_detail_checkout', 'desc')
                                                                        ->get();
                                                                    $toko = DB::table('tb_detail_checkout')
                                                                        ->join('tb_keranjang', 'tb_detail_checkout.id_keranjang', '=', 'tb_keranjang.id_keranjang')
                                                                        ->join('tb_barang', 'tb_keranjang.id_barang', '=', 'tb_barang.id_barang')
                                                                        ->join('tb_toko', 'tb_keranjang.id_toko', '=', 'tb_toko.id_toko')
                                                                        ->where('id_checkout', $check->id_checkout)
                                                                        ->orderByDesc('id_detail_checkout')
                                                                        ->limit(1)
                                                                        ->get();
                                                                    ?>
                                                                    @foreach ($detail as $dt)
                                                                        <div class="row">
                                                                            <div class="col-md-2 text-center">
                                                                                <img class="img-produk"
                                                                                    src="/images/post/{{ $dt->foto }}"
                                                                                    alt="produk">
                                                                            </div>
                                                                            <div class="col-md-7 mt-3">
                                                                                <div class="product-detail">
                                                                                    <a class="nama-produk-modal"
                                                                                        href="{{ url('produkdetail') }}">{{ $dt->nama_barang }}</a>
                                                                                    <p class="head-detail-modal">Nama Toko
                                                                                        :</p>
                                                                                    <p class="isi">
                                                                                        {{ $dt->nama_toko }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 mt-3">
                                                                                <div class="total-belanja-modal">
                                                                                    <h4>Total Harga</h4>
                                                                                    <h3>@currency($dt->sub_harga)</h3>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="tombol text-right ">
                                                                            <a href="{{ url('produkdetail', $dt->id_barang) }}"
                                                                                class="beli-lagi mt-4">Beli
                                                                                Lagi</a>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        $info = DB::table('tb_checkout')
                                                            ->where('id_checkout', $check->id_checkout)
                                                            ->get();
                                                        ?>
                                                        @foreach ($toko as $it)
                                                            <div class="info-pengiriman">
                                                                <div class="info-header d-flex">
                                                                    <i class="fa fa-list-alt text-success mt-1 mr-3"></i>
                                                                    <h4 class="info-header-text">Info Pengiriman</h4>
                                                                </div>
                                                                <div class="info-shipping d-flex">
                                                                    <p class="shipping-title1">Kurir</p><span>:</span>
                                                                    <div class="shipping-content">
                                                                        <p>Kurir BosPangan</p>
                                                                    </div>
                                                                </div>
                                                                <div class="info-shipping d-flex">
                                                                    <p class="shipping-title">Alamat</p><span>:</span>
                                                                    <div class="shipping-content">
                                                                        <p>
                                                                            {{ $it->nama_toko }}
                                                                            <br>
                                                                            {{ $it->hp_toko }}
                                                                            <br>
                                                                            {{ $it->alamat }}
                                                                            <br>
                                                                            Kepanjen Kidul, Kota Blitar
                                                                            <br>
                                                                            Jawa Timur, 66115
                                                                        <p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        @foreach ($info as $i)
                                                            <div class="info-payment pb-5">
                                                                <div class="info-header d-flex">
                                                                    <i class="fa fa-list-alt text-success mt-1 mr-3"></i>
                                                                    <h4 class="info-header-text">Info Pembayaran</h4>
                                                                </div>
                                                                <div class="payment-method mt-3">
                                                                    <div class="payment-content">
                                                                        <span class="method">Metode
                                                                            Pembayaran</span><span
                                                                            class="value">{{ $i->metode_pembayaran }}</span>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="dash mt-3 mr-3"></div>
                                                                <div class="payment-method mt-3">
                                                                    <div class="payment-content">
                                                                        <span class="method">Total
                                                                            Harga</span><span
                                                                            class="value">@currency($i->subtotal)</span>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="payment-method mt-3">
                                                                    <div class="payment-content">
                                                                        <span class="method">Total
                                                                            Ongkir</span><span
                                                                            class="value">@currency($i->ongkir)</span>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="dash mt-3 mr-3"></div>
                                                                <div class="payment-total mt-3">
                                                                    <div class="payment-content">
                                                                        <span class="method">Total
                                                                            Belanja</span><span
                                                                            class="value">@currency($i->total)</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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

            function konfirmasi() {
                confirm("Press a button!");
            }
        </script>
    @endsection
