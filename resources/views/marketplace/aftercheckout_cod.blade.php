@extends('marketplace.layout.layout_afterchekout')

@section('content')

    {{-- Web Starts --}}
    <div class="aft-co">
        <div class="card-co card">
            <div class="body-co card-body">
                <div class="title-checkout">
                    <h4 class="txt_ttl">Checkout</h4>
                </div>
                <div class="detail-pembayaran">
                    <table class="table-borderless">
                        <tbody>
                            <tr>
                                <td class="t_dt col-4">
                                    <span class="dtl_bayar">Total Pembayaran</span>
                                </td>
                                <td class="t_dt col-1">
                                    <span class="dtl_bayar ">:</span>
                                </td>
                                <td class="t_dt">
                                    <span class="dtl_bayar_v ">@currency(100000)</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-4">
                                    <span class="dtl_bayar ">Metode Pembayaran</span>
                                </td>
                                <td class="col-1">
                                    <span class="dtl_bayar ">:</span>
                                </td>
                                <td>
                                    <span class="dtl_bayar_v ">COD</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="inpo-bayar">
                    <div class="title-checkout">
                        <img class="img-cod" src="{{ asset('assets/marketplace/images/onprocess.jpg') }}" alt="">
                    </div>
                    <div class="inp-cod">
                        <div class="title-checkout">
                            <p class="txt_tf text-center">Barang Anda Telah Diproses , Cek Status anda di menu " <span
                                    class="riwayat">Riwayat Pesanan</span> "
                            </p>
                        </div>
                    </div>
                    <div class="title-checkout">
                        <div class="tmbl_soon">
                            <a href="{{ url('/') }}" class="tombol1">
                                <span><i class="fas fa-money-bill-wave mr-3"></i></span>
                                Keluar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="footer-co">
                    <div class="title-checkout">
                        <h4 class="txt_thnks">Terima Kasih Telah Berbelanja Di Marketplace Kami</h4>
                    </div>
                    <div class="title-checkout">
                        <img class="img-co" src="{{ asset('assets/marketplace/images/aft-checkout.jpg') }}"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- web Ends --}}
    {{-- Mobile Starts --}}
    <div class="aft-co-mobile">
        <div class="card-co card">
            <div class="body-co card-body">
                <div class="title-checkout">
                    <h4 class="txt_ttl-mbl">Checkout</h4>
                </div>
                <div class="detail-pembayaran">
                    <table class="table-borderless">
                        <tbody>
                            <tr>
                                <td class="t_dt col-6">
                                    <span class="dtl_bayar-mbl">Total Pembayaran</span>
                                </td>
                                <td class="t_dt col-1">
                                    <span class="dtl_bayar-mbl">:</span>
                                </td>
                                <td class="t_dt">
                                    <span class="dtl_bayar_v-mbl">@currency(100000)</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-7">
                                    <span class="dtl_bayar-mbl">Metode Pembayaran</span>
                                </td>
                                <td class="col-1">
                                    <span class="dtl_bayar-mbl">:</span>
                                </td>
                                <td>
                                    <span class="dtl_bayar_v-mbl">COD</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="inpo-bayar">
                    <div class="title-checkout">
                        <img class="img-cod" src="{{ asset('assets/marketplace/images/onprocess.jpg') }}" alt="">
                    </div>
                    <div class="inp-cod">
                        <div class="title-checkout">
                            <h4 class="txt_tf-mbl text-center">Barang Anda Telah Diproses , Cek Status anda di menu " <span
                                    class="riwayat">Riwayat Pesanan</span> "
                            </h4>
                        </div>
                    </div>
                    <div class="title-checkout">
                        <div class="tmbl_soon">
                            <a href="{{ url('/') }}" class="tombol1">
                                <span><i class="fas fa-money-bill-wave mr-3"></i></span>
                                Keluar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="footer-co">
                    <div class="title-checkout">
                        <h4 class="txt_thnks">Terima Kasih Telah Berbelanja Di Marketplace Kami</h4>
                    </div>
                    <div class="title-checkout">
                        <img class="img-co" src="{{ asset('assets/marketplace/images/aft-checkout.jpg') }}"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Mobile Ends --}}

@endsection
