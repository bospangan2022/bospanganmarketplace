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
            <div class="col-sm-12">
                <div class="panel panel-default invoice" id="invoice">
                    <div class="panel-body">
                        <div class="invoice-ribbon">
                            <div class="ribbon-inner">Lunas</div>
                        </div>
                        <div class="row">

                            <div class="col-sm-6 top-left">
                                <img src="{{ asset('assets/marketplace/images/bp.png') }}" alt="">
                            </div>

                            <div class="col-sm-6 top-right">
                                <h3>INVOICE-123</h3>
                                <span>14 April 2014</span>
                            </div>
                        </div>
                        <div class="invoice-content">
                            <div class="box-invoice">
                                <div class="head-invoice bg-light">
                                    <strong>DETAIL PEMBAYARAN</strong>
                                </div>
                                <div class="body-invoice my-3 row">
                                    <div class="items-invoice col-6">
                                        <p class="invoice-label">Metode</p>
                                        <p>:</p>
                                        <p class="invoice-text">Transfer Langsung</p>
                                    </div>
                                    <div class="items-invoice col-6">
                                        <p class="invoice-label">Status Transaksi</p>
                                        <p>:</p>
                                        <p class="invoice-text">Lunas</p>
                                    </div>
                                </div>
                            </div>
                            <div class="box-invoice row">
                                <div class="col-6 ">
                                    <div class="head-invoice bg-light">
                                        <strong>DATA PEMESAN</strong>
                                    </div>
                                    <div class="body-invoice  my-3 ">
                                        <div class="items-invoice">
                                            <p class="invoice-label">Nama </p>
                                            <p>:</p>
                                            <p class="invoice-text">Sandra Destya</p>
                                        </div>
                                        <div class="items-invoice">
                                            <p class="invoice-label">Email </p>
                                            <p>:</p>
                                            <p class="invoice-text">s.sandradestya@gmail.com</p>
                                        </div>
                                        <div class="items-invoice">
                                            <p class="invoice-label">No. Hp </p>
                                            <p>:</p>
                                            <p class="invoice-text">081331848908</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="head-invoice bg-light">
                                        <strong>DETAIL TOKO</strong>
                                    </div>
                                    <div class="body-invoice  my-3 ">
                                        <div class="items-invoice">
                                            <p class="invoice-label">Nama Toko</p>
                                            <p>:</p>
                                            <p class="invoice-text">Berkah Maju Jaya</p>
                                        </div>
                                        <div class="items-invoice">
                                            <p class="invoice-label">Alamat Toko</p>
                                            <p>:</p>
                                            <p class="invoice-text">Lorem, ipsum dolor sit amet consectetur
                                                adipisicing
                                                elit. Facere repudiandae
                                                error modi, non deleniti voluptate magni iure natus, dolorem, eaque
                                                obcaecati in ducimus? Corrupti aperiam reprehenderit voluptate,
                                                veritatis
                                                hic doloremque!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-invoice row">
                                <div class="head-invoice bg-light">
                                    <strong>DETAIL PENGIRIMAN</strong>
                                </div>
                                <div class="col-6">
                                    <div class="body-invoice my-3">
                                        <div class="items-invoice">
                                            <p class="invoice-label">Nama Tujuan</p>
                                            <p>:</p>
                                            <p class="invoice-text">Sandra Destya</p>
                                        </div>
                                        <div class="items-invoice">
                                            <p class="invoice-label">No. Hp</p>
                                            <p>:</p>
                                            <p class="invoice-text">081331848908</p>
                                        </div>
                                        <div class="items-invoice">
                                            <p class="invoice-label">Alamat </p>
                                            <p>:</p>
                                            <p class="invoice-text">Lorem ipsum, dolor sit amet consectetur
                                                adipisicing
                                                elit. Numquam dolorum
                                                repudiandae sunt illum assumenda aliquid ipsam natus fugiat ad dolores
                                                sit,
                                                adipisci suscipit esse voluptates similique enim quae sed cumque.</p>
                                        </div>
                                        <div class="items-invoice">
                                            <p class="invoice-label">Catatan </p>
                                            <p>:</p>
                                            <p class="invoice-text">Depan Indomaret</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-content-mobile">
                            <div class="box-invoice">
                                <div class="head-invoice bg-light">
                                    <strong>DETAIL PEMBAYARAN</strong>
                                </div>
                                <div class="body-invoice my-3">
                                    <div class="items-invoice">
                                        <p class="invoice-label">Pembelian Melalui</p>
                                        <p>:</p>
                                        <p class="invoice-text">Transfer Langsung</p>
                                    </div>
                                    <div class="items-invoice">
                                        <p class="invoice-label">Status Transaksi</p>
                                        <p>:</p>
                                        <p class="invoice-text">Lunas</p>
                                    </div>
                                </div>
                            </div>
                            <div class="box-invoice">
                                <div class="head-invoice bg-light">
                                    <strong>DATA PEMESAN</strong>
                                </div>
                                <div class="body-invoice  my-3 ">
                                    <div class="items-invoice">
                                        <p class="invoice-label">Nama </p>
                                        <p>:</p>
                                        <p class="invoice-text">Sandra Destya</p>
                                    </div>
                                    <div class="items-invoice">
                                        <p class="invoice-label">Email </p>
                                        <p>:</p>
                                        <p class="invoice-text">s.sandradestya@gmail.com</p>
                                    </div>
                                    <div class="items-invoice">
                                        <p class="invoice-label">No. Hp </p>
                                        <p>:</p>
                                        <p class="invoice-text">081331848908</p>
                                    </div>
                                </div>
                            </div>
                            <div class="box-invoice">
                                <div class="head-invoice bg-light">
                                    <strong>DETAIL TOKO</strong>
                                </div>
                                <div class="body-invoice  my-3 ">
                                    <div class="items-invoice">
                                        <p class="invoice-label">Nama Toko</p>
                                        <p>:</p>
                                        <p class="invoice-text">Berkah Maju Jaya</p>
                                    </div>
                                    <div class="items-invoice">
                                        <p class="invoice-label">Alamat Toko</p>
                                        <p>:</p>
                                        <p class="invoice-text">Lorem, ipsum dolor sit amet consectetur
                                            adipisicing
                                            elit. Facere repudiandae
                                            error modi, non deleniti voluptate magni iure natus, dolorem, eaque
                                            obcaecati in ducimus? Corrupti aperiam reprehenderit voluptate,
                                            veritatis
                                            hic doloremque!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="box-invoice">
                                <div class="head-invoice bg-light">
                                    <strong>DETAIL PENGIRIMAN</strong>
                                </div>
                                <div class="body-invoice my-3">
                                    <div class="items-invoice">
                                        <p class="invoice-label">Nama Tujuan</p>
                                        <p>:</p>
                                        <p class="invoice-text">Sandra Destya</p>
                                    </div>
                                    <div class="items-invoice">
                                        <p class="invoice-label">No. Hp</p>
                                        <p>:</p>
                                        <p class="invoice-text">081331848908</p>
                                    </div>
                                    <div class="items-invoice">
                                        <p class="invoice-label">Alamat </p>
                                        <p>:</p>
                                        <p class="invoice-text">Lorem ipsum, dolor sit amet consectetur
                                            adipisicing
                                            elit. Numquam dolorum
                                            repudiandae sunt illum assumenda aliquid ipsam natus fugiat ad dolores
                                            sit,
                                            adipisci suscipit esse voluptates similique enim quae sed cumque.</p>
                                    </div>
                                    <div class="items-invoice">
                                        <p class="invoice-label">Catatan </p>
                                        <p>:</p>
                                        <p class="invoice-text">Depan Indomaret</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row table-row">
                        <div class="head-invoice bg-light my-3">
                            <strong>DETAIL PEMBELIAN</strong>
                        </div>
                        <div class="table-responsive mx-2">
                            <table class="table">
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
                                        <td>Flatter Theme</td>
                                        <td class="text-right">10</td>
                                        <td class="text-right">$18</td>
                                        <td class="text-right">$180</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>Flat Icons</td>
                                        <td class="text-right">6</td>
                                        <td class="text-right">$59</td>
                                        <td class="text-right">$254</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td>Wordpress version</td>
                                        <td class="text-right">4</td>
                                        <td class="text-right">$95</td>
                                        <td class="text-right">$285</td>
                                    </tr>
                                    <tr class="last-row">
                                        <td class="text-center">4</td>
                                        <td>Server Deployment</td>
                                        <td class="text-right">1</td>
                                        <td class="text-right">$300</td>
                                        <td class="text-right">$300</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" style="background-color:#f2f2f2;"></td>
                                        <td style="background-color:#f2f2f2;">Total Belanja</td>
                                        <td>Rp 87000</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="background-color:#f2f2f2;"></td>
                                        <td style="background-color:#f2f2f2;">Ongkir</td>
                                        <td>Rp 3000</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="background-color:#f2f2f2;"></td>
                                        <td style="background-color:#f2f2f2;">Grand Total</td>
                                        <td>Rp 90000</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="bottom-invoice my-5">
                        <p class="lead marginbottom text-success text-center"><b>THANK YOU!</b></p>
                        <div class="button-bottom d-flex justify-content-around">
                            <button class="btn btn-success" id="invoice-print"><i class="fa fa-print"></i>
                                Print
                                Invoice</button>
                            <button class="btn btn-primary"><i class="fas fa-arrow-left"></i>Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
