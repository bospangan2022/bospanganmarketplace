<?php

use Illuminate\Support\Facades\DB;

?>
@extends('layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <h2 class="title mb-4"><b>Gerobak Terbengkalai</b></h2>
            <div class="title-list col-8 d-flex justify-content-between mb-4">
                <div class="list-detail">
                    <span>Total Terbengkalai</span>
                    <h3 class="my-2"><b>{{ $total_keranjang }}</b></h3>
                </div>
                <div class="list-detail">
                    <span>Total penjualan yang dipulihkan</span>
                    <h3 class="my-2"><b>@currency($total_dana)</b></h3>
                </div>
                <div class="list-detail" style="color:#37BA32;">
                    <span>Automatic recovery emails</span>
                    <h3 class="my-2"><b>Aktifkan</b></h3>
                </div>
            </div>
            <div class="row">
                <form action="{{ url('cari_gerobak') }}">
                    <div class="input-group my-4">
                        <span class="input-group-text" id="basic-addon1"><i class="ti-search"></i></span>
                        <input type="text" name="cari" class="form-control" placeholder="Cari Nama Pelanggan"
                            aria-label="Username" aria-describedby="basic-addon1" />
                    </div>
                </form>
                <div class="content-main row">
                    <div class="accordion-filter col-4">
                        <div class="filter-title mb-3">
                            <h4><b>Filter Berdasarkan :</b></h4>
                        </div>
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseOne">
                                        Tanggal
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
                                        Status Keranjang
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
                                            <input class="form-check-input " type="checkbox" value="" id="flexCheckChecked"
                                                checked>
                                        </div>
                                        <div class="form-check d-flex justify-content-between my-3">
                                            <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                                Ditinggalkan: Pengingat tidak terkirim
                                            </label>
                                            <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                                        </div>
                                        <div class="form-check d-flex justify-content-between my-3">
                                            <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                                Ditinggalkan: Pengingat terkirim
                                            </label>
                                            <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                                        </div>
                                        <div class="form-check d-flex justify-content-between my-3">
                                            <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                                Dipulihkan
                                            </label>
                                            <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree">
                                        Metode Pembayaran
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
                                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseFour">
                                        Metode Pengiriman
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
                                                Pengiriman Daerah: Sanankulon, Garum, Kanigoro, Nglegok
                                            </label>
                                            <input class="form-check-input " type="checkbox" value="" id="flexCheckDefault">
                                        </div>
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
                            @foreach ($keranjang as $k)
                                <?php
                    $check = DB::table("tb_keranjang")
                        ->join(
                            "tb_barang",
                            "tb_keranjang.id_barang",
                            "=",
                            "tb_barang.id_barang"
                        )
                        ->where("id_user", $k->id_user)
                        ->where("tb_keranjang.status", "t")
                        ->count();

                    // $page = $keranjang->paginate(3);

                    $total = DB::table("tb_keranjang")
                        ->join(
                            "tb_barang",
                            "tb_keranjang.id_barang",
                            "=",
                            "tb_barang.id_barang"
                        )
                        ->where("id_user", $k->id_user)
                        ->where("tb_keranjang.status", "t")
                        ->sum("sub_harga");

                    if ($check != 0) { ?>
                                <div class="container justify-content-center p-3 mt-3 border-bottom">
                                    <div class="row ms-2 mb-3">
                                        <input class="form-check-input col-1 p-2" type="checkbox" value=""
                                            id="flexCheckDefault" name="foo">
                                        <div class="col-md-8">
                                            <div class="product">
                                                <span class="fs-3"> <b>#</b></span>
                                                <span class="me-3 fs-3"> <b>{{ $k->id_user }}</b></span>
                                            </div>

                                            <div class="email">
                                                <span class="fs-3 text-info"><b>{{ $k->email }}</b></span>
                                            </div>
                                            <div class="date mt-3 mb-1">
                                                <span class="me-2">{{ $k->name }}</span>
                                                <span class=" text-warning">surel pengingat tidak dikirim</span>
                                            </div>
                                            <div class="phone mb-1">
                                                <span class="me-2">{{ $k->no_hp }}</span>
                                            </div>
                                            <div class="country mb-1">
                                                <span class="me-2">Indonesia</span>
                                            </div>
                                            <div class="shipping mb-1 mt-3 d-flex">
                                                <i class='mdi mdi-truck-fast fs-5 text-info me-3'></i>
                                                <span class="me-2 ">Pengiriman daerah {{ $k->alamat }}</span>
                                            </div>
                                            <?php $jumlah = DB::table('tb_keranjang')
                                                ->where('id_user', $k->id_user)
                                                ->where('tb_keranjang.status', 't')
                                                ->count(); ?>

                                            <div class="orders mb-1 mt-3 d-flex">
                                                <i class='ti-shopping-cart fs-5 text-info me-3'></i>
                                                <div class="orders-more">
                                                    <span class="me-2 ">Pembelian {{ $jumlah }}
                                                        Product</span>
                                                    <a data-toggle="modal" data-target="#detail-1{{ $k->id_user }}"
                                                        class="btn btn-info btn-sm">
                                                        Detail <i class="fa fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 ">
                                            <div class="price-tag mb-2">
                                                <strong class="fs-3">@currency($total)</strong>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn btn-outline-dark btn-md dropdown-toggle" type="button"
                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Perbarui
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item" data-toggle="modal"
                                                            data-target="#re-email">Kirim Email</a></li>
                                                    <li><a class="dropdown-item" href="#">Tempatkan Pesanan</a></li>
                                                    <li><a class="dropdown-item hapus"
                                                            href="{{ url('hapus_gerobak') }}">Hapus</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }
                    ?>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            {{ $page->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!--Modal Details-->
    @foreach ($keranjang as $k)
        <?php $detail = DB::table('tb_keranjang')
            ->join('tb_barang', 'tb_keranjang.id_barang', '=', 'tb_barang.id_barang')
            ->where('id_user', $k->id_user)
            ->where('tb_keranjang.status', 't')
            ->get(); ?>
        <div class="modal fade" id="detail-1{{ $k->id_user }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Pembelian BASEP</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Beli</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail as $d)
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $d->nama_barang }}</td>
                                        <td>{{ $d->jumlah }}</td>
                                        <td>{{ $d->sub_harga }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!--Modal Kirim Ulang Email-->
    <div class="modal fade" id="re-email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kirim Email Pemulihan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <p>Surat elektronik menyelesaikan pesanan mereka.</p>
                        <div class="row mb-3 d-flex align-items-md-center">
                            <label for="inputEmail" class="col-sm-2 col-form-label pe-0 ">Untuk :</label>
                            <div class="col-5">
                                <input type="text" class="form-control" placeholder="nomer hp" READONLY>
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control" placeholder="email" READONLY>
                            </div>
                        </div>
                        <div class="row mb-3 d-flex align-items-md-center">
                            <label for="inputPerihal" class="col-sm-2 col-form-label pe-0 ">Perihal :</label>
                            <div class="col-10">
                                <input type="text" class="form-control" value="You left items in your cart">
                            </div>
                        </div>
                        <div class="row mb-5 d-flex align-items-md-center">
                            <label for="inputPerihal" class="form-label pe-0 ">Pesan khusus untuk pelanggan ini:</label>
                            <textarea class="form-control"
                                value="It looks like you left some items in your shopping cart. Don’t worry, we saved your cart so you can pick up where you left off. But don’t wait too long. Get your items before they’re gone."
                                id="Textarea2" style="height: 100px"></textarea>
                        </div>
                        <div class="orders mb-1 mt-3 d-flex">
                            <i class='ti-shopping-cart fs-5 text-info me-3'></i>
                            <div class="orders-more">
                                <span class="me-2 ">Pembelian 2 Product</span>
                                <a data-toggle="modal" data-target="#detail-1" class="btn btn-info btn-sm">
                                    Detail <i class="fa fa-eye"></i>
                                </a>
                            </div>
                        </div>
                        <div class="phone mb-1">
                            <span class="me-2">0813292909083</span>
                        </div>
                        <div class="country mb-1">
                            <span class="me-2">Indonesia</span>
                        </div>
                        <div class="shipping mb-1 mt-3 d-flex">
                            <i class='mdi mdi-truck-fast fs-5 text-info me-3'></i>
                            <span class="me-2 ">Pengiriman daerah Blitar : Ponggok, Srengat, Wonodadi, Gandusari,
                                Wlingi, Doko, Selorejo, dll</span>
                        </div>
                        <div class="row mb-3 d-flex align-items-md-center justify-content-lg-around"></div>
                        <button type="submit" class="btn btn-primary">Kirim Email</button>
                        <button type="submit" class="btn btn-success">Tinjau Ulang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
