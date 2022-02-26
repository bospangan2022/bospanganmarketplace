<?php

use Illuminate\Support\Facades\DB;

?>
@extends('admin_toko.layout.layout')
@section('content')
    @foreach ($pesanan as $pes)
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="conntainer-title col-6 d-flex">
                        <h2 class="title bold me-2">Pemesanan </h2>
                        <h2 class="title bold"># </h2>
                        <h2 class="title bold">{{ $pes->id_checkout }} </h2>
                    </div>
                    <a class="text-primary" href="{{ url('invoice_user', $pes->id_checkout) }}"
                        style="text-decoration: none;">Cetak</a>
                </div>

                <!--Button-->
                <div class="row d-flex">
                    <div class="new-item col-8">
                        <div class="image-list card my-2">
                            <div class="card-body d-flex justify-content border-bottom">
                                <span class="title bold  me-1">@currency($pes->total)</span>
                                <span class="title bold  me-1"> —</span>
                                <span class="title bold  me-1">{{ $pes->tanggal }}</span>
                            </div>
                            <div class="row">
                                @if ($pes->metode_pembayaran == 'tf')
                                    <div class="col-4">
                                        <strong class="btn me-2 pb-2 ">Metode Pembayaran</strong>
                                        <div class="btn btn me-2 pt-0 ">
                                            <h4>Transfer </h4>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-6">
                                        <strong class="btn me-2 pb-2 ">Metode Pembayaran</strong>
                                        <div class="btn btn me-2 pt-0 ">
                                            <h4>Bayar Saat Pesanan Tiba (COD) </h4>
                                        </div>
                                    </div>
                                @endif
                                <?php
                                
                                $status = DB::table('tb_checkout')
                                    ->select('tb_checkout.status')
                                    ->where('id_checkout', $pes->id_checkout)
                                    ->get();
                                ?>
                                @foreach ($status as $st)
                                    @if ($st->status == 'belumdibayar')
                                        <div class="col-4">
                                            <strong class="btn me-2 pb-2 ">Status Pesanan</strong>
                                            <div class="btn btn me-2 pt-0 ">
                                                <h4>Belum Dibayar</h4>
                                            </div>
                                        </div>
                                    @elseif($st->status == 'dikemas')
                                        <div class="col-4">
                                            <strong class="btn me-2 pb-2 ">Status Pesanan</strong>
                                            <div class="btn btn me-2 pt-0 ">
                                                <h4>Dikemas</h4>
                                            </div>
                                        </div>
                                    @elseif($st->status == 'dikirim')
                                        <div class="col-4">
                                            <strong class="btn me-2 pb-2 ">Status Pesanan</strong>
                                            <div class="btn btn me-2 pt-0 ">
                                                <h4>Dikirm</h4>
                                            </div>
                                        </div>
                                    @elseif($st->status == 'selesai')
                                        <div class="col-4">
                                            <strong class="btn me-2 pb-2 ">Status Pesanan</strong>
                                            <div class="btn btn me-2 pt-0 ">
                                                <h4>Selesai</h4>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="image-list-mobile card my-2">
                            <div class="card-body d-flex justify-content-center border-bottom">
                                <span class="txt-mobile bold  me-1">@currency($pes->total)</span>
                                <span class="txt-mobile bold  me-1"> —</span>
                                <span class="txt-mobile bold  me-1">{{ $pes->tanggal }}</span>
                            </div>
                            <div class="row">
                                @if ($pes->metode_pembayaran == 'tf')
                                    <div class="col-6 d-flex flex-column align-items-center">
                                        <strong class="btn me-2 pb-2 ">Metode Pembayaran</strong>
                                        <div class="btn btn me-2 pt-0 ">
                                            <h5>Transfer </h5>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-6 d-flex flex-column align-items-center">
                                        <strong class="btn me-2 pb-2 ">Metode Pembayaran</strong>
                                        <div class="btn btn me-2 pt-0 ">
                                            <h5>Bayar Saat Pesanan Tiba (COD) </h5>
                                        </div>
                                    </div>
                                @endif
                                <?php
                                
                                $status = DB::table('tb_checkout')
                                    ->select('tb_checkout.status')
                                    ->where('id_checkout', $pes->id_checkout)
                                    ->get();
                                ?>
                                @foreach ($status as $st)
                                    @if ($st->status == 'belumdibayar')
                                        <div class="col-6 d-flex flex-column align-items-center">
                                            <strong class="btn me-2 pb-2 ">Status Pesanan</strong>
                                            <div class="btn btn me-2 pt-0 ">
                                                <h5>Belum Dibayar</h5>
                                            </div>
                                        </div>
                                    @elseif($st->status == 'dikemas')
                                        <div class="col-6 d-flex flex-column align-items-center">
                                            <strong class="btn me-2 pb-2 ">Status Pesanan</strong>
                                            <div class="btn btn me-2 pt-0 ">
                                                <h5 class="text-center">Dikemas</h5>
                                            </div>
                                        </div>
                                    @elseif($st->status == 'dikirim')
                                        <div class="col-6 d-flex flex-column align-items-center">
                                            <strong class="btn me-2 pb-2 ">Status Pesanan</strong>
                                            <div class="btn btn me-2 pt-0 ">
                                                <h4>Dikirm</h4>
                                            </div>
                                        </div>
                                    @elseif($st->status == 'selesai')
                                        <div class="col-6 d-flex flex-column align-items-center">
                                            <strong class="btn me-2 pb-2 ">Status Pesanan</strong>
                                            <div class="btn btn me-2 pt-0 ">
                                                <h4>Selesai</h4>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="form-input card mb-4">
                            <div class="card-body">
                                <?php
                                $detail = DB::table('tb_detail_checkout')
                                    ->join('tb_keranjang', 'tb_detail_checkout.id_keranjang', '=', 'tb_keranjang.id_keranjang')
                                    ->join('tb_barang', 'tb_keranjang.id_barang', '=', 'tb_barang.id_barang')
                                    ->where('tb_detail_checkout.id_checkout', $pes->id_checkout)
                                    ->get();
                                ?>
                                @foreach ($detail as $det)
                                    <div class="form-list mb-1 border-bottom">
                                        <div class="row mb-5">
                                            <div class="col-3">
                                                <img src="/images/post/{{ $det->foto }}" style="width: 100px;" alt="">
                                            </div>
                                            <div class="col-5 d-flex flex-column ">
                                                <strong class="mb-2 ">{{ $det->nama_barang }} </strong>
                                                <div class="row">
                                                    <div class="col-3 d-flex">
                                                        <p class="text-muted mb-2 ">SKU:</p>
                                                        <p class="text-muted mb-2 ">{{ $det->sku }}</p>
                                                    </div>
                                                    <div class="col-3 d-flex">
                                                        <p class="text-muted mb-2 ">Berat:</p>
                                                        <p class="text-muted mb-2 ">{{ $det->berat }}</p>
                                                        <p class="text-muted mb-2 ">Kg</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 d-flex justify-content-end ">
                                                <strong class="mb-2 ">@currency($det->sub_harga) </strong>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="table-borderless d-flex justify-content-end">
                                    <table class="col-6 mt-3 ">
                                        <tr>
                                            <td>Barang</td>
                                            <td align="right">

                                                <strong>@currency($pes->subtotal)</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ongkir</td>
                                            <td align="right">

                                                <strong>@currency($pes->ongkir)</strong>
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
                        <div class="form-input-mobile card mb-4">
                            <div class="card-body">
                                <?php
                                $detail = DB::table('tb_detail_checkout')
                                    ->join('tb_keranjang', 'tb_detail_checkout.id_keranjang', '=', 'tb_keranjang.id_keranjang')
                                    ->join('tb_barang', 'tb_keranjang.id_barang', '=', 'tb_barang.id_barang')
                                    ->where('tb_detail_checkout.id_checkout', $pes->id_checkout)
                                    ->get();
                                ?>
                                @foreach ($detail as $det)
                                    <div class="form-list mb-1 border-bottom">
                                        <strong class="mb-2 ">{{ $det->nama_barang }} </strong>
                                        <div class="row">
                                            <div class="col-3 d-flex">
                                                <p class="text-muted mb-2 ">SKU:</p>
                                                <p class="text-muted mb-2 ">{{ $det->sku }}</p>
                                            </div>
                                            <div class="col-6 d-flex">
                                                <p class="text-muted mb-2 ">Berat:</p>
                                                <p class="text-muted mb-2 ">{{ $det->berat }}</p>
                                                <p class="text-muted mb-2 ">Kg</p>
                                            </div>
                                        </div>
                                        <div class="row mb-5">
                                            <div class="col-4">
                                                <img src="/images/post/{{ $det->foto }}" style="width: 100px;" alt="">
                                            </div>
                                            <div class="col-8 d-flex justify-content-end align-items-center ">
                                                <strong class="mb-2 ">@currency($det->sub_harga) </strong>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="table-borderless d-flex justify-content-end">
                                    <table class="col-8 mt-3 ">
                                        <tr>
                                            <td>Barang</td>
                                            <td align="right">

                                                <strong>@currency($pes->subtotal)</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ongkir</td>
                                            <td align="right">

                                                <strong>@currency($pes->ongkir)</strong>
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
                    </div>

                    <div class="new-item col-4">
                        <div class="form-input card mb-4">
                            <div class="card-body">
                                <div class="d-flex flex-column border-bottom">
                                    <strong class="text-muted mb-2">Pelanggan</strong>
                                    <strong class="mb-2">{{ $pes->name }}</strong>
                                    <a href="#" class="mb-2">
                                        <p>{{ $pes->email }}</p>
                                    </a>
                                    <div class="d-flex mb-2">
                                        <p>Telpon:</p>
                                        <p>{{ $pes->phone }}</p>
                                    </div>
                                </div>
                                <div class="d-flex flex-column border-bottom mt-3">
                                    <strong class="text-muted mb-2">Pembayaran dan Alamat Pemesan</strong>
                                    <p class="mb-2" {{ $pes->name }}</p>
                                    <p class="mb-2">{{ $pes->alamat }}</p>
                                    <p class="mb-2">{{ $pes->nama_desa }}, {{ $pes->nama_kecamatan }},
                                        {{ $pes->nama_kota }}, {{ $pes->kode_pos }}</p>
                                    <p class="mb-2">Indonesia</p>
                                    <div class="d-flex mb-2">
                                        <p>Telpon:</p>
                                        <p>{{ $pes->phone }}</p>
                                    </div>
                                </div>
                                @if ($pes->metode_pembayaran == 'tf')
                                    <div class="d-flex flex-column border-bottom mt-3">
                                        <strong class="text-muted mb-2">Rincian Pembayaran</strong>
                                        <p class="mb-2">Transfer</p>
                                    </div>
                                @else
                                    <div class="d-flex flex-column border-bottom mt-3">
                                        <strong class="text-muted mb-2">Rincian Pembayaran</strong>
                                        <p class="mb-2">Bayar Saat Pesanan Tiba (COD)</p>
                                    </div>
                                @endif
                                @foreach ($status as $st)
                                    @if ($st->status == 'belumdibayar')
                                        <div class="d-flex flex-column border-bottom mt-3">
                                            <strong class="text-muted mb-2">Konfirmasi Pesanan</strong>
                                            <form action="{{ url('konfirmasi_user/pesanan', $pes->id_checkout) }}"
                                                method="GET" onsubmit="return confirm('Konfirmasi Pesanan ?')">
                                                <input type="hidden" value="{{ $pes->email }}" name="email">
                                                <button type="submit" class="btn btn-primary">Konfirmasi
                                                    Pesanan</button>
                                            </form>
                                        </div>
                                    @elseif($st->status == 'dikemas')
                                        <div class="d-flex flex-column border-bottom mt-3">
                                            <strong class="text-muted mb-2">Konfirmasi Pesanan</strong>
                                            <a href="#" class="btn btn-success disabled">Pesanan Sudah Dikonfirmasi</a>
                                        </div>
                                        <div class="d-flex flex-column border-bottom mt-3">
                                            <form action="{{ url('kirim_user/pesanan', $pes->id_checkout) }}"
                                                method="GET" onsubmit="return confirm('Konfirmasi Pesanan ?')">
                                                <input type="hidden" value="{{ $pes->email }}" name="email">
                                                <button type="submit" class="btn btn-primary">Kirim Pesanan</button>
                                            </form>
                                        </div>
                                    @elseif($st->status == 'dikirim')
                                        <div class="d-flex flex-column border-bottom mt-3">
                                            <strong class="text-muted mb-2">Konfirmasi Pesanan</strong>
                                            <a href="#" class="btn btn-success disabled">Pesanan Sudah Dikonfirmasi</a>
                                        </div>
                                        <div class="d-flex flex-column border-bottom mt-3">
                                            <a href="#" class="btn btn-success disabled">Pesanan Telah Dikirim</a>
                                        </div>
                                        <div class="d-flex flex-column border-bottom mt-3">
                                            <form action="{{ url('selesai_user/pesanan', $pes->id_checkout) }}"
                                                method="GET" onsubmit="return confirm('Konfirmasi Pesanan ?')">
                                                <input type="hidden" value="{{ $pes->email }}" name="email">
                                                <button type="submit" class="btn btn-primary">Selesaikan Pesanan</button>
                                            </form>
                                        </div>
                                    @elseif($st->status == 'selesai')
                                        <div class="d-flex flex-column border-bottom mt-3">
                                            <strong class="text-muted mb-2">Konfirmasi Pesanan</strong>
                                            <a href="#" class="btn btn-success disabled">Pesanan Sudah Dikonfirmasi</a>
                                        </div>
                                        <div class="d-flex flex-column border-bottom mt-3">
                                            <a href="#" class="btn btn-success disabled">Pesanan Telah Dikirim</a>
                                        </div>
                                        <div class="d-flex flex-column border-bottom mt-3">
                                            <a href="#" class="btn btn-success disabled">Pesanan Selesai</a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-input-mobile card mb-4">
                        <div class="card-body">
                            <div class="d-flex flex-column border-bottom">
                                <strong class="text-muted mb-2">Pelanggan</strong>
                                <strong class="mb-2">{{ $pes->name }}</strong>
                                <a href="#" class="mb-2">
                                    <p>{{ $pes->email }}</p>
                                </a>
                                <div class="d-flex mb-2">
                                    <p>Telpon:</p>
                                    <p>{{ $pes->phone }}</p>
                                </div>
                            </div>
                            <div class="d-flex flex-column border-bottom mt-3">
                                <strong class="text-muted mb-2">Pembayaran dan Alamat Pemesan</strong>
                                <p class="mb-2" {{ $pes->name }}</p>
                                <p class="mb-2">{{ $pes->alamat }}</p>
                                <p class="mb-2">{{ $pes->nama_desa }}, {{ $pes->nama_kecamatan }},
                                    {{ $pes->nama_kota }}, {{ $pes->kode_pos }}</p>
                                <p class="mb-2">Indonesia</p>
                                <div class="d-flex mb-2">
                                    <p>Telpon:</p>
                                    <p>{{ $pes->phone }}</p>
                                </div>
                            </div>
                            @if ($pes->metode_pembayaran == 'tf')
                                <div class="d-flex flex-column border-bottom mt-3">
                                    <strong class="text-muted mb-2">Rincian Pembayaran</strong>
                                    <p class="mb-2">Transfer</p>
                                </div>
                            @else
                                <div class="d-flex flex-column border-bottom mt-3">
                                    <strong class="text-muted mb-2">Rincian Pembayaran</strong>
                                    <p class="mb-2">Bayar Saat Pesanan Tiba (COD)</p>
                                </div>
                            @endif
                            @foreach ($status as $st)
                                @if ($st->status == 'belumdibayar')
                                    <div class="d-flex flex-column border-bottom mt-3">
                                        <strong class="text-muted mb-2">Konfirmasi Pesanan</strong>
                                        <form action="{{ url('konfirmasi/pesanan', $pes->id_checkout) }}" method="GET"
                                            onsubmit="return confirm('Konfirmasi Pesanan ?')">
                                            <input type="hidden" value="{{ $pes->email }}" name="email">
                                            <button type="submit" class="btn btn-primary">Konfirmasi
                                                Pesanan</button>
                                        </form>
                                    </div>
                                @elseif($st->status == 'dikemas')
                                    <div class="d-flex flex-column border-bottom mt-3">
                                        <strong class="text-muted mb-2">Konfirmasi Pesanan</strong>
                                        <a href="#" class="btn btn-success disabled">Pesanan Sudah Dikonfirmasi</a>
                                    </div>
                                    <div class="d-flex flex-column border-bottom mt-3">
                                        <form action="{{ url('kirim/pesanan', $pes->id_checkout) }}" method="GET"
                                            onsubmit="return confirm('Konfirmasi Pesanan ?')">
                                            <input type="hidden" value="{{ $pes->email }}" name="email">
                                            <button type="submit" class="btn btn-primary">Kirim Pesanan</button>
                                        </form>
                                    </div>
                                @elseif($st->status == 'dikirim')
                                    <div class="d-flex flex-column border-bottom mt-3">
                                        <strong class="text-muted mb-2">Konfirmasi Pesanan</strong>
                                        <a href="#" class="btn btn-success disabled">Pesanan Sudah Dikonfirmasi</a>
                                    </div>
                                    <div class="d-flex flex-column border-bottom mt-3">
                                        <a href="#" class="btn btn-success disabled">Pesanan Telah Dikirim</a>
                                    </div>
                                    <div class="d-flex flex-column border-bottom mt-3">
                                        <form action="{{ url('selesai/pesanan', $pes->id_checkout) }}" method="GET"
                                            onsubmit="return confirm('Konfirmasi Pesanan ?')">
                                            <input type="hidden" value="{{ $pes->email }}" name="email">
                                            <button type="submit" class="btn btn-primary">Selesaikan Pesanan</button>
                                        </form>
                                    </div>
                                @elseif($st->status == 'selesai')
                                    <div class="d-flex flex-column border-bottom mt-3">
                                        <strong class="text-muted mb-2">Konfirmasi Pesanan</strong>
                                        <a href="#" class="btn btn-success disabled">Pesanan Sudah Dikonfirmasi</a>
                                    </div>
                                    <div class="d-flex flex-column border-bottom mt-3">
                                        <a href="#" class="btn btn-success disabled">Pesanan Telah Dikirim</a>
                                    </div>
                                    <div class="d-flex flex-column border-bottom mt-3">
                                        <a href="#" class="btn btn-success disabled">Pesanan Selesai</a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!--End row-->
        </div>
        </div>
        </div>
    @endforeach
@endsection
