@extends('marketplace.layout.layout_afterchekout')

@section('content')

    {{-- Web Start --}}
    <div class="aft-co">
        <div class="card-co card">
            <div class="body-co card-body">
                <div class="title-checkout mt-5">
                    <h4 class="txt_ttl">Info Pendaftaran Buka Toko</h4>
                </div>
                <div class="title-checkout mt-3">
                    <h4 class="txt-info-tk">Terima Kasih Telah Membuka Toko di Marketplace Kami</h4>
                </div>
                <div class="title-checkout">
                    <h4 class="inpo-tk">Setelah ini harap menunggu persetujuan dari pihak kami untuk pendaftaran toko
                        di marketplace kami</h4>
                </div>
                <div class="title-checkout">
                    <a href="{{ url('/') }}" class="tombol1 mt-5">
                        <span><i class="fas fa-sign-out mr-3"></i></span>
                        Keluar
                    </a>
                </div>
                <div class="title-checkout">
                    <img class="img-co" src="{{ asset('assets/marketplace/images/aft-checkout.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    {{-- Web End --}}

    {{-- Mobile Start --}}
    <div class="aft-co-mobile">
        <div class="card-co card">
            <div class="body-co card-body">
                <div class="body-co card-body">
                    <div class="title-checkout mt-5">
                        <h4 class="txt_ttl">Info Pendaftaran Buka Toko</h4>
                    </div>
                    <div class="title-checkout mt-3">
                        <h4 class="txt-info-tk">Terima Kasih Telah Membuka Toko di Marketplace Kami</h4>
                    </div>
                    <div class="title-checkout">
                        <h4 class="inpo-tk">Setelah ini harap menunggu persetujuan dari pihak kami untuk pendaftaran
                            toko
                            di marketplace kami</h4>
                    </div>
                    <div class="title-checkout">
                        <a href="{{ url('/') }}" class="tombol1 mt-5">
                            <span><i class="fas fa-sign-out mr-3"></i></span>
                            Keluar
                        </a>
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
