<?php

use Illuminate\Support\Facades\DB;

?>
@extends('layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row mb-5">
                <h4 class="title">Pemesanan</h4>
                <div class="ecwid-orders__header my-3">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="ti-search"></i></span>
                        <input type="text" class="form-control" placeholder="Pesanan,rincian pelanggan, item yang dipesan"
                            aria-label="Username" aria-describedby="basic-addon1" />
                    </div>
                </div>
                <div class="content-main row">
                    <div class="accordion-filter col-4">
                        <div class="filter-title mb-3">
                            <h4><b>Filter Berdasarkan :</b></h4>
                        </div>
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingZero">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseZero" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseZero">
                                        Filter Data Pemesanan
                                    </button>
                                </h2>

                                <div id="panelsStayOpen-collapseZero" class="accordion-collapse collapse show"
                                    aria-labelledby="panelsStayOpen-headingZero"
                                    data-bs-parent="#accordionPanelsStayOpenExample">
                                    <div class="accordion-body">
                                        <div class="tags d-flex justify-content-between my-2">
                                            <a href="{{ url('pemesanan') }}" style="text-decoration: none">Semua
                                                Pesanan</a>
                                            <span>{{ $semua }}</span>
                                        </div>
                                        <div class="tags d-flex justify-content-between my-2">
                                            <a href="{{ url('filter', 'belumdibayar') }}"
                                                style="text-decoration: none">Belum
                                                Dibayar /
                                                Dikonfirmasi</a>
                                            <span>{{ $belum_bayar }}</span>
                                        </div>
                                        <div class="tags d-flex justify-content-between my-2">
                                            <a href="{{ url('filter', 'dikemas') }}"
                                                style="text-decoration: none">Dikemas</a>
                                            <span>{{ $dikemas }}</span>
                                        </div>
                                        <div class="tags d-flex justify-content-between my-2">
                                            <a href="{{ url('filter', 'dikirim') }}"
                                                style="text-decoration: none">Dikirim</a>
                                            <span>{{ $dikirim }}</span>
                                        </div>
                                        <div class="tags d-flex justify-content-between my-2">
                                            <a href="{{ url('filter', 'selesai') }}"
                                                style="text-decoration: none">Selesai</a>
                                            <span>{{ $selesai }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                        <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false"
                                            aria-controls="panelsStayOpen-collapseOne">
                                            Berdasarkan Tanggal
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="panelsStayOpen-headingOne"
                                        data-bs-parent="#accordionPanelsStayOpenExample">
                                        <div class="accordion-body">
                                            <div class="form-group">
                                                <label for="form-1-1" class="control-label">Tanggal</label>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input class="form-control form-control-solid col-1 mr-2 mb-3"
                                                            id="namapegawai" type="datetime-local">
                                                        <button type="button" class="btn btn-outline-dark  mr-2 mb-3"
                                                            style="width:100%;height:20%  ">Hari Ini</button>
                                                        <button type="button" class="btn btn-outline-dark  mr-2 mb-3"
                                                            style="width:100%;height:20%">Minggu Ini</button>
                                                    </div>
                                                    <div class="col-6">
                                                        <input class="form-control form-control-solid col-1 mr-2 mb-3"
                                                            id="namapegawai" type="datetime-local">
                                                        <button type="button" class="btn btn-outline-dark  mr-2 mb-3"
                                                            style="width:100%;height:20%">Bulan Ini</button>
                                                        <button type="button" class="btn btn-outline-dark  mr-2 mb-3"
                                                            style="width:100%;height:20%">Tahun Ini</button>
                                                    </div>
                                                    <button type="button" class="btn btn-outline-dark  mr-2"
                                                        style="width:100%;height:20%">Sepanjang Waktu</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                            aria-controls="panelsStayOpen-collapseTwo">
                                            Berdasarkan Status Pembayaran
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="panelsStayOpen-headingTwo"
                                        data-bs-parent="#accordionPanelsStayOpenExample">
                                        <div class="accordion-body">
                                            <div class="form-check d-flex justify-content-between my-3">
                                                <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                                    Apa Saja
                                                </label>
                                                <input class="form-check-input " type="checkbox" value=""
                                                    id="flexCheckChecked" checked>
                                            </div>
                                            <div class="form-check d-flex justify-content-between my-3">
                                                <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                                    Telah Dibayar
                                                </label>
                                                <input class="form-check-input " type="checkbox" value=""
                                                    id="flexCheckDefault">
                                            </div>
                                            <div class="form-check d-flex justify-content-between my-3">
                                                <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                                    Menunggu Pembayaran
                                                </label>
                                                <input class="form-check-input " type="checkbox" value=""
                                                    id="flexCheckDefault">
                                            </div>
                                            <div class="form-check d-flex justify-content-between my-3">
                                                <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                                    Dibatalkan
                                                </label>
                                                <input class="form-check-input " type="checkbox" value=""
                                                    id="flexCheckDefault">
                                            </div>
                                            <div class="form-check d-flex justify-content-between my-3">
                                                <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                                    Biaya Telah Dikembalikan
                                                </label>
                                                <input class="form-check-input " type="checkbox" value=""
                                                    id="flexCheckDefault">
                                            </div>
                                            <div class="form-check d-flex justify-content-between my-3">
                                                <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                                    Dana Dikembalikan Sebagian
                                                </label>
                                                <input class="form-check-input " type="checkbox" value=""
                                                    id="flexCheckDefault">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree">
                                        Berdasarkan Status Pemenuhan
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="panelsStayOpen-headingThree"
                                    data-bs-parent="#accordionPanelsStayOpenExample">
                                    <div class="accordion-body">
                                        <div class="form-check d-flex justify-content-between my-3">
                                            <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                                Apa Saja
                                            </label>
                                            <input class="form-check-input " type="checkbox" value="" id="flexCheckChecked"
                                                checked>
                                        </div>
                                        <div class="form-check d-flex justify-content-between my-3">
                                            <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                                Menunggu Proses
                                            </label>
                                            <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                                        </div>
                                        <div class="form-check d-flex justify-content-between my-3">
                                            <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                                Sedang Proses
                                            </label>
                                            <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                                        </div>
                                        <div class="form-check d-flex justify-content-between my-3">
                                            <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                                Siap Diambil
                                            </label>
                                            <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                                        </div>
                                        <div class="form-check d-flex justify-content-between my-3">
                                            <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                                Telah Dikirim
                                            </label>
                                            <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                                        </div>
                                        <div class="form-check d-flex justify-content-between my-3">
                                            <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                                Sedang Dikirim
                                            </label>
                                            <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                                        </div>
                                        <div class="form-check d-flex justify-content-between my-3">
                                            <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                                Pengiriman Dibatalkan
                                            </label>
                                            <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                                        </div>
                                        <div class="form-check d-flex justify-content-between my-3">
                                            <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                                Telah Dikembalikan
                                            </label>
                                            <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseFour">
                                    Berdasarkan Metode Pembayaran
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingFour"
                                data-bs-parent="#accordionPanelsStayOpenExample">
                                <div class="accordion-body">
                                    <div class="form-check d-flex justify-content-between my-3">
                                        <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                            Apa Saja
                                        </label>
                                        <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault"
                                            checked>
                                    </div>
                                    <div class="form-check d-flex justify-content-between my-3">
                                        <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                            COD
                                        </label>
                                        <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                    <div class="form-check d-flex justify-content-between my-3">
                                        <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                            Transfer ke Rekening BCA Pendiri
                                        </label>
                                        <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseFive">
                                    Berdasarkan Metode Pengiriman
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingFive"
                                data-bs-parent="#accordionPanelsStayOpenExample">
                                <div class="accordion-body">
                                    <div class="form-check d-flex justify-content-between my-3">
                                        <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                            Apa Saja
                                        </label>
                                        <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault"
                                            checked>
                                    </div>
                                    <div class="form-check d-flex justify-content-between my-3">
                                        <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                            Pengiriman Daerah Blitar Kota
                                        </label>
                                        <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                    <div class="form-check d-flex justify-content-between my-3">
                                        <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                            Pengiriman Daerah: Sanankulon, Garum, Kanigoro, Nglegok
                                        </label>
                                        <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseSix">
                                    Berdasarkan Pickup or delivery date and time
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingSix"
                                data-bs-parent="#accordionPanelsStayOpenExample">
                                <div class="accordion-body">
                                    <div class="row mx-3">
                                        <input class="form-control mb-3" id="namapegawai" type="text" placeholder="Dari">
                                        <input class="form-control mb-3" id="namapegawai" type="text" placeholder="Sampai">
                                        <div class="col-6">
                                            <button type="button" class="btn btn-outline-dark mb-3"
                                                style="width:100%;  ">Hari Ini</button>
                                            <button type="button" class="btn btn-outline-dark mb-3"
                                                style="width:100%;">Minggu Ini</button>
                                        </div>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-outline-dark mb-3"
                                                style="width:100%;">Bulan Ini</button>
                                            <button type="button" class="btn btn-outline-dark mb-3"
                                                style="width:100%;">Tahun Ini</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseSeven">
                                    Berdasarkan Products
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingSeven"
                                data-bs-parent="#accordionPanelsStayOpenExample">
                                <div class="accordion-body">
                                    <div class="search d-flex mx-0">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="ti-search"></i></span>
                                        <input type="text" class="form-control" placeholder="Product Name Or SKU"
                                            aria-label="Username" aria-describedby="basic-addon1" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 card-content">
                        <div class="navigasi my-3 d-flex justify-content-between">
                            <div class="form-check ms-4">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                    onClick="toggle(this)">
                                <label class="form-check-label ms-0 fs-6" for="flexCheckChecked">
                                    Pilih Semua
                                </label>
                            </div>
                        </div>
                        <div class="card">
                            @foreach ($pesanan as $pes)
                                <div class="container justify-content-center p-3 mt-3 border-bottom">
                                    <div class="row ms-2 mb-3 justify-content-lg-between">
                                        <input class="form-check-input col-1 p-2" type="checkbox" value=""
                                            id="flexCheckDefault" name="foo">
                                        <div class="col-md-7">
                                            <div class="product mb-3">
                                                <span class="fs-3"> <b>#</b></span>
                                                <span class="me-3 fs-3"> <b>{{ $pes->id_checkout }}</b></span>
                                                <span class="me-3 fs-5 text-muted "> <b>{{ $pes->tanggal }}</b></span>
                                            </div>
                                            <?php
                                            
                                            $status = DB::table('tb_checkout')
                                                ->select('tb_checkout.status')
                                                ->where('id_checkout', $pes->id_checkout)
                                                ->get();
                                            ?>
                                            @foreach ($status as $st)
                                                @if ($st->status == 'belumdibayar')
                                                    <div class="buyer mt-3 mb-1">
                                                        <span class="me-2">Status :</span>
                                                        <a href="#" style="text-decoration: none;">Belum Dibayar / Belum
                                                            Dikonfirmasi</a>
                                                    </div>
                                                @elseif($st->status == 'dikemas')
                                                    <div class="buyer mt-3 mb-1">
                                                        <span class="me-2">Status :</span>
                                                        <a href="#" style="text-decoration: none;">Di Kemas</a>
                                                    </div>
                                                @elseif($st->status == 'dikirim')
                                                    <div class="buyer mt-3 mb-1">
                                                        <span class="me-2">Status :</span>
                                                        <a href="#" style="text-decoration: none;">Di Kirim</a>
                                                    </div>
                                                @elseif($st->status == 'selesai')
                                                    <div class="buyer mt-3 mb-1">
                                                        <span class="me-2">Status :</span>
                                                        <a href="#" style="text-decoration: none;">Selesai</a>
                                                    </div>
                                                @endif
                                            @endforeach
                                            @if ($pes->metode_pembayaran == 'tf')
                                                <div class="buyer mt-3 mb-1">
                                                    <span class="me-2">Metode Pembayaran :</span>
                                                    <a href="#" style="text-decoration: none;">Transfer</a>
                                                </div>
                                            @else
                                                <div class="buyer mt-3 mb-1">
                                                    <span class="me-2">Metode Pembayaran :</span>
                                                    <a href="#" style="text-decoration: none;">>Bayar Saat Pesanan Tiba
                                                        (COD)</a>
                                                </div>
                                            @endif
                                            <div class="buyer mt-3 mb-1">
                                                <span class="me-2">{{ $pes->name }}</span>
                                                <a href="#" style="text-decoration: none;">{{ $pes->email }}</a>
                                            </div>
                                            <div class="address mb-1">
                                                <span
                                                    class="me-2">{{ $pes->alamat }},{{ $pes->nama_desa }},{{ $pes->nama_kecamatan }},{{ $pes->nama_kota }}
                                                </span>
                                            </div>
                                            <div class="phone mb-1">
                                                <span class="me-2">Telepon</span>
                                                <span>{{ $pes->phone }}</span>
                                            </div>
                                            <div class="orders mb-3 mt-3 d-flex">
                                                <i class='ti-shopping-cart fs-5 text-info me-3'></i>
                                                <div class="orders-more">
                                                    <span class="me-2 ">Pembelian 2 Product</span>
                                                    <a data-toggle="modal" data-target="#edit{{ $pes->id_checkout }}"
                                                        class="btn btn-info btn-sm">Detail <i
                                                            class="fa fa-eye"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 ">
                                            <div class="price-tag mb-2">
                                                <strong class="fs-3">@currency($pes->subtotal)</strong>
                                            </div>
                                            <div class="dropdown">
                                                <a href="{{ url('pemesanan_detail', $pes->id_checkout) }}"
                                                    class="btn btn-primary">
                                                    Konfirmasi Pesanan
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="keterangan d-flex justify-content-end">
                            <p>Menampilkan </p>
                            <p>3 </p>
                            <p>Pesanan. </p>
                            <p>Total Sales: </p>
                            <p>Rp. 200.000</p>
                        </div>
                    </div>
                    <div class="container-bottom ">
                        <div class="row mb-5">
                            <div class="icon-e col-2">
                                <i class="ti-export fs-1 text-info"></i>
                            </div>
                            <div class="ekspor col-4">
                                <h3>Ekspor Pesanan</h3>
                                <div class="icon-e-mobile col-2">
                                    <i class="ti-export fs-1 text-info"></i>
                                </div>
                                <p>Ekspor pesanan menghasilkan file CSV dengan informasi lengkap semua pesanan yang dipilih
                                    yang Anda dapat lihat dan editi di program spreadsheet mana saja.
                                <p>
                                    <a href="#" class="btn btn-primary">Ekspor</a>
                            </div>
                            <div class="icon-p col-2">
                                <i class="ti-printer fs-1 text-info"></i>
                            </div>
                            <div class="print col-4">
                                <h3>Cetak Pesanan</h3>
                                <div class="icon-p-mobile col-2">
                                    <i class="ti-printer fs-1 text-info"></i>
                                </div>
                                <p>Pilih pesanan untuk dicetak fakturnya. Anda dapat menyimpan pesanan yang dicetak untuk
                                    catatan Anda sendiri atau menyertakannya dalam paket pengiriman sebagai konfirmasi
                                    pesanan untuk pelanggan Anda.
                                <p>
                                    <a href="#" class="btn btn-primary">Cetak Pesanan yang Dipilih</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    </div>






    <!--Modal Edit-->
    @foreach ($pesanan as $pes)
        <div class="modal fade" id="edit{{ $pes->id_checkout }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Pemesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    $detail = DB::table('tb_detail_checkout')
                        ->join('tb_keranjang', 'tb_detail_checkout.id_keranjang', '=', 'tb_keranjang.id_keranjang')
                        ->join('tb_barang', 'tb_keranjang.id_barang', '=', 'tb_barang.id_barang')
                        ->where('tb_detail_checkout.id_checkout', $pes->id_checkout)
                        ->get();
                    ?>

                    <div class="modal-body">
                        <div class="content-body mx-5 p-3 mt-3 fs-4">
                            <a class="btn text-primary p-0 fs-5 mb-2" href="{{ url('fixedorder') }}" role="button">
                                Print
                                Order</a>
                            <div class="row mb-3 border-bottom ">
                                <div class="col-md-8">
                                    <div class="product mb-2">
                                        <a href="{{ url('pemesanan') }}" style="text-decoration:none;">
                                            <span class="fs-3"> Pesan</span>
                                            <span class="fs-3"> #</span>
                                            <span class="fs-3"> {{ $pes->id_checkout }}</span>
                                            <i class="ti-angle-right"></i>
                                        </a>
                                    </div>
                                    <div class="auth d-flex mb-2">
                                        <p class="fs-6 me-2 "> Dikirim Ke</p>
                                        <p class="fs-6 text-info ">{{ $pes->name }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="status d-flex mb-2 text-left text-muted justify-content-end">
                                        <p class="fs-6 me-2 "> {{ $pes->tanggal }}</p>
                                    </div>
                                    <div class="date d-flex mb-2 text-left justify-content-end">
                                        <span class="fs-3 me-3"> Total Rp.</span>
                                        <span class="fs-3"> 42.000</span>
                                    </div>
                                    <div class="auth d-flex mb-2 text-muted justify-content-end">
                                        <p class="fs-6 me-2 "> 1</p>
                                        <p class="fs-6 "> item</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <div class="col-md-6">
                                    <div class="row border-bottom mb-2 ">
                                        <div class="col-sm-7 mb-3">
                                            <p class="fs-6"> EMAIL PELANGGAN</p>
                                            <input type="text" class="form-control" id="validationCustom01"
                                                value="{{ $pes->email }}" disabled>
                                        </div>
                                        <div class="col-sm-5 d-flex justify-content-end align-items-lg-center text-info">
                                            <i class="ti-email"></i>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-sm-10 mb-3">
                                            <p class="fs-6">METODE PEMBAYARAN</p>
                                            <input type="text" class="form-control" id="validationCustom01"
                                                value="{{ $pes->metode_pembayaran }}" readonly>
                                        </div>
                                        <div class="col-sm-2 d-flex justify-content-end align-items-lg-center text-info">
                                            <i class="ti-money"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="row  mb-2 ">
                                        <div class="col-sm-10 mb-2 ">
                                            <p class="fs-6">PENAGIHAN DAN ALAMAT PENGIRIMAN</p>
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Nama </span>
                                                <input type="text" class="form-control" aria-label="Sizing example input"
                                                    value="{{ $pes->name }}" aria-describedby="inputGroup-sizing-sm"
                                                    readonly>
                                            </div>
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Alamat</span>
                                                <input type="text" class="form-control" aria-label="Sizing example input"
                                                    value="{{ $pes->alamat }},{{ $pes->nama_desa }},{{ $pes->nama_kecamatan }},{{ $pes->nama_kota }}"
                                                    aria-describedby="inputGroup-sizing-sm" readonly>
                                            </div>
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Telepon</span>
                                                <input type="text" class="form-control" aria-label="Sizing example input"
                                                    value="{{ $pes->phone }}" aria-describedby="inputGroup-sizing-sm"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 d-flex justify-content-end align-items-lg-center text-info">
                                            <i class="ti-map-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    @foreach ($detail as $det)
                                        <div class="row border-bottom border-top  mb-2 ">
                                            <div class="col-sm-6 mb-2">
                                                <div class="row mb-2 mt-3">
                                                    <div class="col-3">
                                                        <img src="/images/post/{{ $det->foto }}" style="width: 100px;"
                                                            alt="">
                                                    </div>
                                                    <div class="col-8 d-flex flex-column ">
                                                        <input type="text" class="form-control mb-2"
                                                            id="validationCustom01" value="{{ $det->nama_barang }}"
                                                            readonly>
                                                        <div class="row">
                                                            <div class="col-5 d-flex">
                                                                <p class="text-muted mb-2 me-2 ">SKU:</p>
                                                                <input type="text" class="form-control px-1 "
                                                                    id="validationCustom01" value="{{ $det->sku }}"
                                                                    readonly>
                                                            </div>
                                                            <div class="col-7 d-flex">
                                                                <p class="text-muted mb-2 me-2 ">Berat:</p>
                                                                <input type="text" class="form-control ps-1"
                                                                    id="validationCustom01" value="{{ $det->berat }}"
                                                                    readonly>
                                                                <input type="text" class="form-control ps-1"
                                                                    id="validationCustom01" value="{{ $det->satuan }}"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-5 d-flex justify-content-end align-items-lg-center">
                                                <strong class="mb-2 me-2 ">@currency($det->sub_harga) </strong>
                                                <strong class="mb-2 me-2 text-muted ">X</strong>
                                                <strong class="mb-2  ">{{ $det->jumlah }}</strong>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="row d-flex justify-content-end mb-3">

                                        <table class="col-6 mt-3 ">
                                            <tr>
                                                <td>Subtotal</td>
                                                <td align="right">
                                                    <div class="input-group input-group-sm mb-3" style="width:200px;">

                                                        <input type="text" class="form-control"
                                                            aria-label="Sizing example input"
                                                            value="@currency($pes->subtotal)"
                                                            aria-describedby="inputGroup-sizing-sm" readonly>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ongkir</td>
                                                <td align="right">
                                                    <div class="input-group input-group-sm mb-3" style="width:200px;">

                                                        <input type="text" class="form-control"
                                                            aria-label="Sizing example input"
                                                            value="@currency($pes->ongkir)"
                                                            aria-describedby="inputGroup-sizing-sm" readonly>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Diskon</td>
                                                <td align="right">
                                                    <div class="input-group input-group-sm mb-3" style="width:200px;">
                                                        <span class="input-group-text" id="inputGroup-sizing-sm">Rp</span>
                                                        <input type="text" class="form-control"
                                                            aria-label="Sizing example input" value="0"
                                                            aria-describedby="inputGroup-sizing-sm" readonly>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Total</b></td>
                                                <td align="right">

                                                    <strong>@currency($pes->total)</strong>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('js')
    <script language="JavaScript">
        function toggle(source) {
            checkboxes = document.getElementsByName('foo');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = source.checked;
            }
        }
    </script>
@endsection
