@extends('marketplace.layout.layout_afterchekout')

@section('content')

    {{-- Web Start --}}
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
                                    <span class="dtl_bayar_v ">Transfer Bank</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="inpo-bayar">
                    <div class="title-checkout">
                        <h4 class="txt_tf">Silahkan transfer pada nomor rekening dibawah ini</h4>
                    </div>
                    <div class="title-checkout">
                        <h4 class="txt_no_rek">090090909090</h4>
                    </div>
                    <div class="title-checkout">
                        <h4 class="txt_itf">Apabila anda sudah melakukan pembayaran lewat transfer bank silahkan
                            upload
                            bukti pembayaran dibawah ini !</h4>
                    </div>
                    <div class="title-checkout">
                        <div class="upl-bukti text-center">
                            <p class="title-upl">Upload Bukti :</p>
                            <input class="inp_upload" type="file" />
                        </div>
                    </div>
                    <div class="title-checkout">
                        <button type="submit" class="tombol1"><span>
                                <i class="fas fa-upload mr-3"></i>
                            </span>Upload Bukti Pembayaran
                        </button>
                    </div>
                    <div class="title-checkout">
                        <h4 class="txt_tf">atau</h4>
                    </div>
                    <div class="title-checkout">
                        <div class="tmbl_soon">
                            <a href="{{ url('/') }}" class="tombol1">
                                <span><i class="fas fa-money-bill-wave mr-3"></i></span>
                                Bayar Nanti
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
    {{-- Web End --}}

    {{-- Mobile Start --}}
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
                                <td class="t_dt col-7">
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
                                    <span class="dtl_bayar_v-mbl">Transfer Bank</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="inpo-bayar">
                    <div class="title-checkout">
                        <h4 class="txt_tf-mbl">Silahkan transfer pada nomor rekening dibawah ini</h4>
                    </div>
                    <div class="title-checkout">
                        <h4 class="txt_no_rek-mbl">090090909090</h4>
                    </div>
                    <div class="title-checkout">
                        <h4 class="txt_itf-mbl">Apabila anda sudah melakukan pembayaran lewat transfer bank silahkan
                            upload
                            bukti pembayaran dibawah ini !</h4>
                    </div>
                    <div class="title-checkout">
                        <div class="upl-bukti text-center">
                            <p class="title-upl">Upload Bukti :</p>
                            <input class="inp_upload" type="file" />
                        </div>
                    </div>
                    <div class="title-checkout">
                        <button type="submit" class="tombol1"><span>
                                <i class="fas fa-upload mr-3"></i>
                            </span>Upload Bukti Pembayaran
                        </button>
                    </div>
                    <div class="title-checkout">
                        <h4 class="txt_tf">atau</h4>
                    </div>
                    <div class="title-checkout">
                        <div class="tmbl_soon">
                            <a href="{{ url('/') }}" class="tombol1">
                                <span><i class="fas fa-money-bill-wave mr-3"></i></span>
                                Bayar Nanti
                            </a>
                        </div>
                    </div>
                </div>
                <div class="footer-co">
                    <div class="title-checkout">
                        <h4 class="txt_thnks-mbl">Terima Kasih Telah Berbelanja Di Marketplace Kami</h4>
                    </div>
                    <div class="title-checkout">
                        <img class="img-co" src="{{ asset('assets/marketplace/images/aft-checkout.jpg') }}"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Mobile End --}}

@endsection
