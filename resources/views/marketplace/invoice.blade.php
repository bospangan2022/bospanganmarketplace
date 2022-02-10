<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bos Pangan | Invoice</title>
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/marketplace/images/favicon.png') }}" />

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/marketplace/css/invoice-style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container bootstrap snippets bootdeys">
        <div class="row">
            @foreach ($checkout as $co)
                <div class="col-sm-12">
                    <div class="panel panel-default invoice" id="invoice">
                        <div class="panel-body">
                            <div class="invoice-ribbon">
                                <?php if ($co->status == "belumdibayar") { ?>
                                <div class="ribbon-inner">Menunggu Pembayaran</div>
                                <?php } else { ?>
                                <div class="ribbon-paid-inner">Lunas</div>
                                <?php } ?>
                            </div>
                            <div class="header row">
                                <div class="col-sm-6 top-left">
                                    <img src="{{ asset('assets/marketplace/images/bp.png') }}" alt="">
                                </div>

                                <div class="col-sm-6 top-right">
                                    <h3>INVOICE-{{ $co->id_checkout }}</h3>
                                    <span>{{ $co->tanggal }}</span>
                                </div>
                            </div>
                            <div class="invoice-content">
                                <div class="box-invoice">
                                    <div class="head-invoice bg-light">
                                        <strong>DETAIL PEMBAYARAN</strong>
                                    </div>
                                    <div class="body-invoice my-1 row">
                                        <div class="items-invoice col-6">
                                            <p class="invoice-label">Metode</p>
                                            <p>:</p>
                                            <?php if ($co->metode_pembayaran == 'tf') {
                                                echo '<p>Transfer Langsung</p>';
                                            } else {
                                                echo '<td >COD</td>';
                                            } ?>
                                        </div>
                                        <div class="items-invoice col-6">
                                            <p class="invoice-label">Status Transaksi</p>
                                            <p>:</p>
                                            <?php if ($co->status == 'belumdibayar') {
                                                echo '<p>Menunggu Pembayaran</p>';
                                            } else {
                                                echo '<td >Lunas</td>';
                                            } ?>
                                        </div>
                                    </div>
                                </div>
            @endforeach
            @foreach ($user as $u)
                <div class="box-invoice row">
                    <div class="col-4 ">
                        <div class="head-invoice bg-light">
                            <strong>DATA PEMESAN</strong>
                        </div>
                        <div class="body-invoice  my-1 ">
                            <div class="items-invoice">
                                <p class="invoice-label">Nama </p>
                                <p>:</p>
                                <p class="invoice-text">{{ $u->name }}</p>
                            </div>
                            <div class="items-invoice">
                                <p class="invoice-label">Email </p>
                                <p>:</p>
                                <p class="invoice-text">{{ $u->email }}</p>
                            </div>
                            <div class="items-invoice">
                                <p class="invoice-label">No. Hp </p>
                                <p>:</p>
                                <p class="invoice-text">{{ $u->no_hp }}</p>
                            </div>
                        </div>
                    </div>
            @endforeach

            @foreach ($toko as $t)
                <div class="col-4">
                    <div class="head-invoice bg-light">
                        <strong>DETAIL TOKO</strong>
                    </div>
                    <div class="body-invoice  my-1 ">
                        <div class="items-invoice">
                            <p class="invoice-label">Nama Toko</p>
                            <p>:</p>
                            <p class="invoice-text">{{ $t->nama_toko }}</p>
                        </div>
                        <div class="items-invoice">
                            <p class="invoice-label">Alamat Toko</p>
                            <p>:</p>
                            @foreach ($alamat as $al)
                                <p class="invoice-text">{{ $al->alamat }}, {{ $al->nama_desa }},
                                    {{ $al->nama_kecamatan }},
                                    {{ $al->nama_kota }} {{ $al->kode_pos }} </p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
            @foreach ($delivery as $d)
                <div class="col-4">
                    <div class="head-invoice bg-light">
                        <strong>DETAIL PENGIRIMAN</strong>
                    </div>
                    <div class="body-invoice my-1">
                        <div class="items-invoice">
                            <p class="invoice-label">Nama Tujuan</p>
                            <p>:</p>
                            <p class="invoice-text">{{ $d->nama_penerima }}</p>
                        </div>
                        <div class="items-invoice">
                            <p class="invoice-label">No. Hp</p>
                            <p>:</p>
                            <p class="invoice-text">{{ $d->phone }}</p>
                        </div>
                        <div class="items-invoice">
                            <p class="invoice-label">Alamat </p>
                            <p>:</p>
                            <p class="invoice-text">{{ $d->alamat }}, {{ $d->nama_desa }},
                                {{ $d->nama_kecamatan }},
                                {{ $d->nama_kota }} {{ $d->kode_pos }}
                            </p>
                        </div>
                        <div class="items-invoice">
                            <p class="invoice-label">Catatan </p>
                            <p>:</p>
                            <p class="invoice-text">{{ $d->catatan }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="box-invoice row">

            </div>
        </div>
    </div>
    <div class="invoice-content-mobile">
        <div class="box-invoice">
            <div class="head-invoice bg-light">
                <strong>DETAIL PEMBAYARAN</strong>
            </div>
            <div class="body-invoice my-1 row">
                @foreach ($checkout as $co)
                    <div class="items-invoice col-6">
                        <p class="invoice-label">Metode</p>
                        <p>:</p>
                        <?php if ($co->metode_pembayaran == 'tf') {
                            echo '<p>Transfer Langsung</p>';
                        } else {
                            echo '<td >COD</td>';
                        } ?>
                    </div>
                    <div class="items-invoice col-6">
                        <p class="invoice-label">Status Transaksi</p>
                        <p>:</p>
                        <?php if ($co->status == 'belumdibayar') {
                            echo '<p>Menunggu Pembayaran</p>';
                        } else {
                            echo '<td >Lunas</td>';
                        } ?>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="box-invoice">
            <div class="head-invoice bg-light">
                <strong>DATA PEMESAN</strong>
            </div>
            <div class="body-invoice  my-1 ">
                @foreach ($user as $u)
                    <div class="items-invoice">
                        <p class="invoice-label">Nama </p>
                        <p>:</p>
                        <p class="invoice-text">{{ $u->name }}</p>
                    </div>
                    <div class="items-invoice">
                        <p class="invoice-label">Email </p>
                        <p>:</p>
                        <p class="invoice-text">{{ $u->email }}</p>
                    </div>
                    <div class="items-invoice">
                        <p class="invoice-label">No. Hp </p>
                        <p>:</p>
                        <p class="invoice-text">{{ $u->no_hp }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="box-invoice">
            <div class="head-invoice bg-light">
                <strong>DETAIL TOKO</strong>
            </div>
            <div class="body-invoice  my-1 ">
                @foreach ($toko as $t)
                    <div class="items-invoice">
                        <p class="invoice-label">Nama Toko</p>
                        <p>:</p>
                        <p class="invoice-text">{{ $t->nama_toko }}</p>
                    </div>
                    <div class="items-invoice">
                        <p class="invoice-label">Alamat Toko</p>
                        <p>:</p>
                        @foreach ($alamat as $al)
                            <p class="invoice-text">{{ $al->alamat }}, {{ $al->nama_desa }},
                                {{ $al->nama_kecamatan }},
                                {{ $al->nama_kota }} {{ $al->kode_pos }} </p>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
        <div class="box-invoice">
            <div class="head-invoice bg-light">
                <strong>DETAIL PENGIRIMAN</strong>
            </div>
            <div class="body-invoice my-1">
                @foreach ($delivery as $d)
                    <div class="items-invoice">
                        <p class="invoice-label">Nama Tujuan</p>
                        <p>:</p>
                        <p class="invoice-text">{{ $d->nama_penerima }}</p>
                    </div>
                    <div class="items-invoice">
                        <p class="invoice-label">No. Hp</p>
                        <p>:</p>
                        <p class="invoice-text">{{ $d->phone }}</p>
                    </div>
                    <div class="items-invoice">
                        <p class="invoice-label">Alamat </p>
                        <p>:</p>
                        <p class="invoice-text">{{ $d->alamat }}, {{ $d->nama_desa }},
                            {{ $d->nama_kecamatan }},
                            {{ $d->nama_kota }} {{ $d->kode_pos }}
                        </p>
                    </div>
                    <div class="items-invoice">
                        <p class="invoice-label">Catatan </p>
                        <p>:</p>
                        <p class="invoice-text">{{ $d->catatan }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    <div class="row table-row">
        <div class="head-invoice bg-light my-1">
            <strong>DETAIL PEMBELIAN</strong>
        </div>
        <div class="table-responsive mx-2">
            <table class="table">
                @foreach ($order as $o)
                    <thead>
                        <tr>
                            <th class="text-center" style="width:5%">#</th>
                            <th style="width:50%">Nama Barang</th>
                            <th class="text-right" style="width:15%">Jumlah</th>
                            <th class="text-right" style="width:15%">Harga Satuan</th>
                            <th class="text-right" style="width:15%">Harga Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>{{ $o->nama_barang }}</td>
                            <td class="text-right">{{ $o->jumlah }}</td>
                            <td class="text-right">@currency($o->harga)</td>
                            <td class="text-right">@currency($o->sub_harga)</td>
                        </tr>
                    </tbody>
                @endforeach
                <tfoot>
                    @foreach ($checkout as $co)
                        <tr>
                            <td colspan="3" style="background-color:#f2f2f2;"></td>
                            <td style="background-color:#f2f2f2;">Total Belanja</td>

                            <td>@currency($co->subtotal)</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="background-color:#f2f2f2;"></td>
                            <td style="background-color:#f2f2f2;">Ongkir</td>
                            <td>@currency($co->ongkir)</td>
                        </tr>

                        <tr>
                            <td colspan="3" style="background-color:#f2f2f2;"></td>
                            <td style="background-color:#f2f2f2;">Grand Total</td>
                            <td>@currency($co->total)</td>
                        </tr>
                    @endforeach
                </tfoot>
            </table>
        </div>
    </div>
    <div class="bottom-invoice my-5">
        <p class="lead marginbottom text-success text-center"><b>TERIMA KASIH!</b></p>
        <div class="button-bottom d-flex justify-content-around">
            <a href="{{ url('pemesanan') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i>Kembali</a>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
