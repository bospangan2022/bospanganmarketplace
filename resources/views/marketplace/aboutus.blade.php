@extends('marketplace.layout.layout')

@section('content')

<!--Body Content-->
    <div id="page-content">
    	<!--Collection Banner-->
    	<div class="collection-header">
			<div class="collection-hero">
        		<div class="collection-hero__image"><img class="blur-up lazyload" data-src="{{ asset('assets/marketplace/images/belanja_header.jpg') }}" src="{{ asset('assets/marketplace/images/belanja_header.jpg') }}" alt="Women" title="Women" /></div>
        		<div class="collection-hero__title-wrapper"><h1 class="collection-hero__title page-width">Tentang Kami</h1></div>
      		</div>
		</div>
        <!--End Collection Banner-->
            <div class="container-fluid ">
                <div class="row mb-5">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col  d-flex align-items-center">
                        <div class="text-center mb-4">
                            <h2 class="h2">Tentang Bos Pangan</h2>
                            <div class="rte-setting">
                                <p><strong style="color:#aacc22">"Masalah Pangan Beres"</strong></p>
                                <p>Bos Pangan adalah sebuah start-up yang bergerak dibidang perpanganan, baik pangan untuk manusia, hewan, bahkan tumbuhan. Bos Pangan didirikan oleh Rafif Irfan, S.T. pada Kamis malam tanggal 23 September 2021.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="oto mb-5 d-flex justify-content-center">
                <div class="row"> 
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex justify-content-center">
                        <img src="{{ asset('assets/marketplace/images/logo.png') }}" style="width: 400px;" alt="">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-4">
                        <h2 class="h2 mb-3">Otobiografi</h2>
                        <div class="rte-setting has-dropcap"><p>Blitar merupakan sebuah kota kecil dimana pendiri Bos Pangan bertempat tinggal. Pendiri menempuh masa studinya di TK Alhidayah Bendo, kemudian melanjutkannya di RA Plus dan MI Plus Hidayatullah Blitar. Selepas itu, SMPN 1 Blitar dan SMAN 1 Blitar menjadi tujuan dari pendiri untuk menimba Ilmu.
                        Lantas, pendiri pergi ke Surabaya pada tahun 2016 untuk menimba ilmu di D3 Teknik Sipil-ITS. Pada tahun 2017, pendiri menempuh pendidikan S1-Teknik Elektro di Institut Teknologi-PLN. Pendiri lulus pada tahun 2021, kemudian melanjutkan terjun di bidang Pangan.
                        Dengan bekal, semangat belajar dan senantiasa menebar berkah pendiri meyakini Bos Pangan kelak menjadi biosfer-platform yang berkah dan bermanfaat bagi dunia pangan. Dengan begitu "MASALAH PANGAN BERES" dapat terwujud.</p></div>
                    </div>
                </div>
                </div>
                <div class="row my-5 ">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-4 d-flex flex-column justify-content-center">
                        <h2 class="h2 ">Visi Misi Bos Pangan</h2>
                        <div class="misi-text mb-2">
                            <p>Visi Misi Bos Pangan dalam mewujudkan kesejahteraan pangan di negeri yang gemah ripah loh jinawi (subur, makmur, dan kaya raya).</p>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Lihat Visi Misi Bos Pangan
                            </button>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex justify-content-center">
                        <img src="{{ asset('assets/marketplace/images/pasar.png') }}" >
                    </div>
                </div>
                
                <div class="collapse bg-light py-5 my-5 " id="collapseExample">
                    <div class="visi text-center mb-5">
                        <h2 class="h2 mb-3">Visi Bos Pangan</h2>
                        <div class="rte-setting">
                            <p>Bos Pangan adalah sebuah start-up yang bergerak dibidang perpanganan, baik pangan untuk manusia, hewan, bahkan tumbuhan. Bos Pangan didirikan oleh Rafif Irfan, S.T. pada Kamis malam tanggal 23 September 2021.</p>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center ">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center mb-4">
                            <h2 class="h2">5 Misi Bos Pangan</h2>
                        </div>
                        <div class="misi-card card">
                            <div class="misi-icon">
                                <img src="assets/marketplace/images/card1.jpg" alt="">
                            </div>
                            <div class="misi-title d-flex justify-content-center">Misi 1</div>
                            <div class="misi-text d-flex justify-content-center">Menyediakan bahan pangan segar bagi bisnis dan Customer dengan mengutamakan kualitas terbaik dan kuantitas yang cukup.</div>
                        </div>
                        <div class="misi-card card">
                            <div class="misi-icon">
                                <img src="assets/marketplace/images/card2.jpg" alt="">
                            </div>
                            <div class="misi-title d-flex justify-content-center">Misi 2</div>
                            <div class="misi-text d-flex justify-content-center">Menyediakan benih dan bibit unggul bagi bisnis dan kustomer dengan prinsip open source formula bagi mitra Bos Pangan.</div>
                        </div>
                        <div class="misi-card card">
                            <div class="misi-icon">
                                <img src="assets/marketplace/images/card3.jpg" alt="">
                            </div>
                            <div class="misi-title d-flex justify-content-center">Misi 3</div>
                            <div class="misi-text d-flex justify-content-center">Menyediakan bahan pendukung pangan dengan bahan baku yang dapat melestarikan dan mempercantik kehidupan semesta.</div>
                        </div>
                        <div class="misi-card card">
                            <div class="misi-icon">
                                <img src="assets/marketplace/images/card4.jpg" alt="">
                            </div>
                            <div class="misi-title d-flex justify-content-center">Misi 4</div>
                            <div class="misi-text d-flex justify-content-center">Menyediakan platform jual dan beli baik skala ekspor-impor maupun lokal bagi para pengepul, distributor, pedagang, dan toko kelontong.</div>
                        </div>
                        <div class="misi-card card">
                            <div class="misi-icon">
                                <img src="assets/marketplace/images/card5.jpg" alt="">
                            </div>
                            <div class="misi-title d-flex justify-content-center">Misi 5</div>
                            <div class="misi-text d-flex justify-content-center">Menyediakan teknologi mutakhir guna mencukupi kebutuhan pangan skala global.</div>
                        </div>
                    </div>
                </div>
                <!--End Main Content-->
            </div>
        </div>
    <!--End Body Content-->

@endsection