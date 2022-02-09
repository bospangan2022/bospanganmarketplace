@extends('marketplace.layout.layout_checkout')

@section('content')

    <div id="page-content">
        <!--Page Title-->
        <div class="page section-header text-center">
            <div class="page-title">
                <div class="wrapper">
                    <h1 class="page-width">Checkout</h1>
                </div>
            </div>
        </div>
        <!--End Page Title-->

        <div class="container">
            <div class="row">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                    <div class="customer-box customer-coupon">
                        <h3 class="font-15 xs-font-13"><i class="icon anm anm-gift-l"></i> Have a coupon? <a
                                href="#have-coupon" class="text-white text-decoration-underline"
                                data-toggle="collapse">Click here to enter your code</a></h3>
                        <div id="have-coupon" class="collapse coupon-checkout-content">
                            <div class="discount-coupon">
                                <div id="coupon" class="coupon-dec tab-pane active">
                                    <p class="margin-10px-bottom">Enter your coupon code if you have one.</p>
                                    <label class="required get" for="coupon-code"><span class="required-f">*</span>
                                        Coupon</label>
                                    <input id="coupon-code" required="" type="text" class="mb-3">
                                    <button class="coupon-btn btn" type="submit">Apply Coupon</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row billing-fields">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 sm-margin-30px-bottom">
                    <div class="create-ac-content bg-light-gray padding-20px-all mb-3">
                        <h2 class="login-title mb-3">Alamat Penerima</h2>
                        <div class="row">
                            @foreach ($user as $us)
                                <?php
                                $lat_penerima = $us->lat_desa;
                                $lng_penerima = $us->lng_desa;
                                ?>
                                <div class="form-group col-md-12 col-lg-12 col-xl-12 border-bottom">
                                    <table class="table-borderless ms-5 mb-5">
                                        <tbody>

                                            <tr>
                                                <td class="col-1">
                                                    <span>Nama Penerima</span>
                                                </td>
                                                <td class="col-1">
                                                    <span>:</span>
                                                </td>
                                                <td>
                                                    <span>{{ $us->nama_penerima }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    <span>No Hp</span>
                                                </td>
                                                <td class="col-1">
                                                    <span>:</span>
                                                </td>
                                                <td>
                                                    <span>{{ $us->phone }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    <span>Alamat</span>
                                                </td>
                                                <td class="col-1">
                                                    <span>:</span>
                                                </td>
                                                <td>
                                                    <span>{{ $us->alamat }} </span>
                                                    <span>{{ $us->nama_kota }}</span>
                                                    <span>{{ $us->nama_kecamatan }}</span>
                                                    <span>{{ $us->nama_desa }}</span>
                                                    <span>{{ $us->kode_pos }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    <span>Catatan</span>
                                                </td>
                                                <td class="col-1">
                                                    <span>:</span>
                                                </td>
                                                <td>
                                                    <span>{{ $us->catatan }}</span>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-end mb-2 ">
                                        <a class="btn btn-sm btn-seccondary m   e-5" href="{{ url('profil') }}">Ubah
                                            Alamat</a>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="create-ac-content bg-light-gray padding-20px-all mb-3">
                        <h2 class="login-title mb-3">Alamat Toko</h2>
                        <div class="row">
                            @foreach ($alamat_toko as $at)
                                <?php
                                $lat_toko = $at->lat_desa;
                                $lng_toko = $at->lng_desa;
                                function getDistanceBetween($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'Mi')
                                {
                                    $theta = $longitude1 - $longitude2;
                                    $distance = sin(deg2rad($latitude1)) * sin(deg2rad($latitude2)) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta));
                                    $distance = acos($distance);
                                    $distance = rad2deg($distance);
                                    $distance = $distance * 60 * 1.1515;
                                    switch ($unit) {
                                        case 'Mi':
                                            break;
                                        case 'Km':
                                            $distance = $distance * 1.609344;
                                    }
                                    return round($distance, 2);
                                }
                                $jarak = getDistanceBetween($lat_penerima, $lng_penerima, $lat_toko, $lng_toko, 'Km');
                                $ongkir = $jarak * 1200;
                                //dd($ongkir);
                                ?>
                                <div class="form-group col-md-12 col-lg-12 col-xl-12 border-bottom">
                                    <table class="table-borderless ms-5 mb-5">
                                        <tbody>

                                            <tr>
                                                <td class="col-1">
                                                    <span>Nama Penjual</span>
                                                </td>
                                                <td class="col-1">
                                                    <span>:</span>
                                                </td>
                                                <td>
                                                    <span>{{ $at->nama_toko }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    <span>No Hp</span>
                                                </td>
                                                <td class="col-1">
                                                    <span>:</span>
                                                </td>
                                                <td>
                                                    <span>{{ $at->hp_toko }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    <span>Alamat</span>
                                                </td>
                                                <td class="col-1">
                                                    <span>:</span>
                                                </td>
                                                <td>
                                                    <span>{{ $at->alamat }} </span>
                                                    <span>{{ $at->nama_kota }}</span>
                                                    <span>{{ $at->nama_kecamatan }}</span>
                                                    <span>{{ $at->nama_desa }}</span>
                                                    <span>{{ $at->kode_pos }}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="your-order-payment">
                        <form action="{{ url('checkout/barang') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="your-order">
                                <h2 class="order-title mb-4">Pesanan Anda</h2>
                                <div class="table-responsive-sm order-table">
                                    <table class="bg-white table table-bordered table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th class="text-left">Nama Produk</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($checkout as $co)
                                                <tr>
                                                    <td class="text-left">{{ $co->nama_barang }}</td>
                                                    <td>@currency($co->harga)</td>
                                                    <td>{{ $co->jumlah }}</td>
                                                    <td>@currency($co->sub_harga)</td>
                                                </tr>
                                                <input type="hidden" name="id_keranjang[]"
                                                    value="{{ $co->id_keranjang }}">
                                                <input type="hidden" name="subtotal" value="{{ $sub_total }}">
                                                <input type="hidden" name="jumlah" value="{{ $count_barang }}">
                                                <input type="hidden" name="id_toko" value="{{ $co->id_toko }}">
                                            @endforeach
                                        </tbody>
                                        <tfoot class="font-weight-600">
                                            <tr>
                                                <td colspan="3" class="text-right">Shipping </td>
                                                <td>@currency($ongkir)</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-right">Total</td>
                                                <?php
                                                $total = $grand_total + $ongkir;
                                                ?>
                                                <input type="hidden" name="ongkir" value="{{ $ongkir }}">
                                                <input type="hidden" name="total" value="{{ $total }}">
                                                <td>@currency($total)</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <hr />

                            <div class="your-payment">
                                <h2 class="payment-title mb-3">Metode Pembayaran</h2>
                                <div class="filters-toolbar__item">
                                    <label for="SortBy" class="hidden">Pilih Metode Pembayaran</label>
                                    <select name="metode_pembayaran" id="SortBy"
                                        class="filters-toolbar__input filters-toolbar__input--sort">
                                        <option value="tf">Transfer Bank ( Di Cek Manual )</option>
                                        <option value="cod">COD</option>
                                    </select>
                                    <input class="collection-header__default-sort" type="hidden" value="manual">
                                </div>
                                <?php
                                    if($count_barang != 0){
                                ?>
                                <div class="payment-method">
                                    <div class="order-button-payment">
                                        <button class="btn" value="Place order" type="submit">Check Out</button>
                                    </div>
                                </div>
                                <?php } else { ?>
                                <div class="payment-method">
                                    <div class="order-button-payment">
                                        <button class="btn" value="Place order" type="button" disabled>Check
                                            Out</button>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
