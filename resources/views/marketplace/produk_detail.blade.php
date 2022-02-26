<?php
use Illuminate\Support\Facades\DB;
?>
@extends('marketplace.layout.layout_produk')

@section('content')

    <div id="page-content">
        <!--MainContent-->
        <div id="MainContent" class="main-content" role="main">
            <!--Breadcrumb-->
            <div class="bredcrumbWrap">
                <div class="container breadcrumbs">
                    <a href="{{ url('/') }}" title="Back to the home page">Home</a><span
                        aria-hidden="true">›</span><span>Deskripsi Produk</span>
                </div>
            </div>
            <!--End Breadcrumb-->

            <div id="ProductSection-product-template" class="product-template__container prstyle1 container">
                @foreach ($barang_kat as $bi)
                    <!--product-single-->
                    <div class="product-single">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="product-details-img">
                                    <div class="product-thumb">
                                        <div id="gallery" class="product-dec-slider-2 product-tab-left">
                                            <a data-image="/images/post/{{ $bi->foto }}"
                                                data-zoom-image="/images/post/{{ $bi->foto }}"
                                                class="slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true"
                                                tabindex="-1">
                                                <img class="blur-up lazyload" src="/images/post/{{ $bi->foto }}"
                                                    alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="zoompro-wrap product-zoom-right pl-20">
                                        <div class="zoompro-span">
                                            <img class="zoompro blur-up lazyload"
                                                data-zoom-image="/images/post/{{ $bi->foto }}" alt=""
                                                src="/images/post/{{ $bi->foto }}" />
                                        </div>
                                        {{-- <div class="product-labels"><span class="lbl on-sale">Sale</span><span
                                                class="lbl pr-label1">new</span></div> --}}
                                        <div class="product-buttons">
                                            <!-- <a href="https://www.youtube.com/watch?v=93A2jOW5Mog" class="btn popup-video" title="View Video"><i class="icon anm anm-play-r" aria-hidden="true"></i></a> -->
                                            <a href="#" class="btn prlightbox" title="Zoom"><i
                                                    class="icon anm anm-expand-l-arrows" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="lightboximages">
                                        <a href="/images/post/{{ $bi->foto }}" data-size="1462x2048"></a>
                                        <a href="/images/post/{{ $bi->foto }}" data-size="1462x2048"></a>
                                        <a href="/images/post/{{ $bi->foto }}" data-size="1462x2048"></a>
                                        <!-- <a href="assets/marketplace/images/product-detail-page/cape-dress-4.jpg" data-size="1462x2048"></a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <a href="assets/marketplace/images/product-detail-page/cape-dress-5.jpg" data-size="1462x2048"></a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <a href="assets/marketplace/images/product-detail-page/cape-dress-6.jpg" data-size="1462x2048"></a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <a href="assets/marketplace/images/product-detail-page/cape-dress-7.jpg" data-size="731x1024"></a> -->
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                                <div class="product-single__meta">
                                    <h1 class="product-single__title">{{ $bi->nama_barang }}</h1>
                                    <div class="product-nav clearfix">
                                        <a href="#" class="next" title="Next"><i class="fa fa-angle-right"
                                                aria-hidden="true"></i></a>
                                    </div>
                                    <div class="prInfoRow">
                                        <div class="product-stock"> <span class="instock ">In Stock</span> <span
                                                class="outstock hide">Unavailable</span>
                                        </div>
                                        <div class="product-sku">SKU: <span
                                                class="variant-sku">{{ $bi->sku }}</span>
                                        </div>
                                        <div class="product-toko">
                                            <a class="nama_toko"
                                                href="{{ url('profil_toko', $bi->nama_toko) }}">Toko :
                                                {{ $bi->nama_toko }}
                                            </a>
                                        </div>
                                        <!-- <div class="product-review"><a class="reviewLink" href="#tab2"><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i><span class="spr-badge-caption">6 reviews</span></a></div> -->
                                    </div>
                                    <p class="product-single__price product-single__price-product-template">

                                        <span
                                            class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                            <span id="ProductPrice-product-template"><span
                                                    class="money">@currency($bi->harga)</span></span>
                                        </span>

                                    </p>
                                    <div class="orderMsg" data-user="23" data-time="24">
                                        <img src="{{ asset('assets/marketplace/images/order-icon.jpg') }}" alt="" />
                                        <strong class="items">Best Seller</strong>
                                    </div>
                                </div>
                                <div class="product-single__description rte">
                                    <ul class="deskripsi">
                                        {{-- <li>Kategori : {{ $bi->nama_kategori }}</li> --}}
                                        <li class="desc_li">Satuan : <a class="desc_a"
                                                href="#">{{ $bi->satuan }}</a> </li>
                                        <li class="desc_li">Kategori : <a class="desc_a"
                                                href="{{ url('belanja_kat', $bi->id_kategori) }}">{{ $bi->nama_kategori }}</a>
                                        </li>
                                        {{-- <li>Berat : {{ $bi->berat }}</li> --}}
                                    </ul>
                                </div>
                                <div id="quantity_message">Cepat! Hanya Tinggal <span
                                        class="items">{{ $bi->stok }}</span> Stock.</div>
                                <!-- <form method="post" action="http://annimexweb.com/cart/add" id="product_form_10508262282" accept-charset="UTF-8" class="product-form product-form-product-template hidedropdown" enctype="multipart/form-data"> -->

                                <!-- Product Action -->
                                <div class="product-action clearfix">
                                    <form action="{{ url('add_cart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $bi->id_barang }}" name="id_barang">
                                        <input type="hidden" value="{{ $bi->harga }}" name="harga">
                                        <input type="hidden" value="{{ $bi->id_toko }}" name="id_toko">
                                        <div class="product-form__item--quantity">
                                            <div class="wrapQtyBtn">
                                                <div class="qtyField">
                                                    <input type="number" style="width: 100px;" id="jumlah" name="jumlah"
                                                        value="1" class="product-form__input qty" onkeyup="sum();">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-form__item--submit">
                                            <button type="submit" name="add" class="btn product-form__cart-submit">
                                                <span>Add to cart</span>
                                            </button>
                                        </div>
                                    </form>

                                    <div class="shopify-payment-button" data-shopify="payment-button">
                                        <button type="button" data-toggle="modal" data-target="#detail-co"
                                            class="shopify-payment-button__button shopify-payment-button__button--unbranded">Beli
                                            Sekarang</button>
                                    </div>


                                    <div class="modal fade" id="detail-co" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="title-modal-detail">Beli Sekarang</h4>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="detail-status">
                                                        <div class="card mb-4">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="header-modal col md-12 flex">
                                                                        <i class="fa fa-shopping-bag text-success mr-2"></i>
                                                                        <h4 class="head-1 mr-5">Produk Detail</h4>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                
                                                                ?>

                                                                <div class="row">
                                                                    <div class="col-md-2 mt-3 text-center">
                                                                        <img class="img-produk"
                                                                            src="/images/post/{{ $bi->foto }}"
                                                                            alt="produk">
                                                                    </div>
                                                                    <div class="col-md-7 mt-3">
                                                                        <div class="product-detail">
                                                                            <a class="nama-produk-modal"
                                                                                href="{{ url('produkdetail') }}">{{ $bi->nama_barang }}</a>
                                                                            <p class="head-detail-modal">Nama Toko
                                                                                :</p>
                                                                            <p class="isi">
                                                                                <a
                                                                                    href="{{ url('profil_toko', $bi->nama_toko) }}">{{ $bi->nama_toko }}
                                                                                </a>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 mt-3">
                                                                        <div class="total-belanja-modal">
                                                                            <h4>Total Harga</h4>
                                                                            <h3>@currency($bi->harga)</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="co-sekarang text-center">
                                                                    <div class="inp-co-jumlah mt-3">
                                                                        <form
                                                                            action="{{ url('checkoutperitem', $bi->id_toko) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <h4 class="ttl_bs">Masukkan Jumlah
                                                                                Barang :
                                                                            </h4>
                                                                            <div class="inp-jumlahco text-center">
                                                                                <input type="hidden"
                                                                                    value="{{ $bi->nama_barang }}"
                                                                                    name="nama_barang">
                                                                                <input type="hidden"
                                                                                    value="{{ $bi->id_barang }}"
                                                                                    name="id_barang">
                                                                                <input type="hidden"
                                                                                    value="{{ $bi->nama_toko }}"
                                                                                    name="nama_toko">
                                                                                <input type="hidden"
                                                                                    value="{{ $bi->harga }}"
                                                                                    name="harga">
                                                                                <div class="product-form__item--co">
                                                                                    <div class="wrapQtyBtn">
                                                                                        <div class="qtyField-co">
                                                                                            <input type="number" id="jumlah"
                                                                                                name="jumlah" value="1"
                                                                                                class="product-form__input qty">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tbl-beli-sekarang">
                                                                                <div class="tmbl_soon">
                                                                                    <button type="submit"
                                                                                        class="tombol1">
                                                                                        <span><i
                                                                                                class="fas fa-money-bill-wave mr-3"></i></span>
                                                                                        Beli Sekarang
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <!-- End Product Action -->
                                <!-- </form> -->
                                <div class="display-table shareRow">
                                    <form method="POST" action="{{ url('add_wishlist') }} "
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="display-table-cell medium-up--one-third">
                                            <input type="hidden" name="id_barang" value="{{ $bi->id_barang }}">
                                            <input type="hidden" name="id_toko" value="{{ $bi->id_toko }}">
                                            <div class="wishlist-btn">
                                                <a class="wishlist add-to-wishlist" href="" type="submit"
                                                    title="Add to Wishlist"><i class="icon anm anm-heart-l"
                                                        aria-hidden="true"></i> <span>Add to Wishlist</span></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!--End-product-single-->
                @endforeach
                <!--Product Fearure-->
                <div class="prFeatures">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 feature">
                            <img src="{{ asset('assets/marketplace/images/credit-card.png') }}" alt="Safe Payment"
                                title="Safe Payment" />
                            <div class="details">
                                <h3>Safe Payment</h3>Metode Pembayaran yang aman
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 feature">
                            <img src="{{ asset('assets/marketplace/images/shield.png') }}" alt="Confidence"
                                title="Confidence" />
                            <div class="details">
                                <h3>Confidence</h3>Jaminann Keamanan Data Pembelian Anda dan Data Pribadi
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 feature">
                            <img src="{{ asset('assets/marketplace/images/worldwide.png') }}" alt="Worldwide Delivery"
                                title="Worldwide Delivery" />
                            <div class="details">
                                <h3>Fast Delivery</h3>Pengiriman Cepat &amp; Aman
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 feature">
                            <img src="{{ asset('assets/marketplace/images/phone-call.png') }}" alt="Hotline"
                                title="Hotline" />
                            <div class="details">
                                <h3>Customer Service</h3>Hubungi 083833833833 Apabila Terdapat Masalah
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Product Fearure-->
                <!--Product Tabs-->
                <div class="tabs-listing">
                    <ul class="product-tabs">
                        <li rel="tab1"><a class="tablink">Product Details</a></li>
                    </ul>
                    <div class="tab-container">
                        <div id="tab1" class="tab-content">
                            @foreach ($barang_kat as $b)
                                <div class="product-description rte">
                                    <p>{{ $b->keterangan }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--End Product Tabs-->



                <!--Recently Product Slider-->
                @foreach ($barang_kat as $b)
                    <div class="related-product grid-products">
                        <header class="section-header">
                            <h2 class="section-header__title text-center h2"><span>Produk Lainnya</span></h2>
                            <p class="sub-heading">Produk lain yang ada di toko kami</p>
                        </header>
                        <div class="productPageSlider">

                            <?php
                            
                            $brg = DB::table('tb_barang')
                                ->join('tb_toko', 'tb_barang.id_toko', '=', 'tb_toko.id_toko')
                                ->where('tb_barang.id_kategori', $b->id_kategori)
                                ->get();
                            
                            // dd($brg);
                            
                            ?>

                            @foreach ($brg as $b)
                                <div class="col-12 item">
                                    <!-- start product image -->
                                    <div class="product-image">
                                        <!-- start product image -->

                                        <a href="{{ url('produkdetail', $b->id_barang) }}">
                                            <!-- image -->
                                            <img class="img-blnj primary blur-up lazyload"
                                                data-src="/images/post/{{ $b->foto }}"
                                                src="/images/post/{{ $b->foto }}" alt="image" title="product">
                                            <!-- End image -->
                                            <!-- Hover image -->
                                            <img class="hover blur-up lazyload"
                                                data-src="/images/post/{{ $b->foto }}"
                                                src="/images/post/{{ $b->foto }}" alt="image" title="product">
                                            <!-- End hover image -->
                                            {{-- <!-- product label -->
                                            <div class="product-labels rectangular"><span
                                                    class="lbl on-sale">-16%</span>
                                                <span class="lbl pr-label1">new</span>
                                            </div>
                                            <!-- End product label --> --}}
                                        </a>
                                        <!-- end product image -->
                                    </div>
                                    <!-- end product image -->

                                    <!--start product details -->
                                    <div class="product-details text-center">
                                        <!-- product name -->
                                        <div class="product-name">
                                            <a
                                                href="{{ url('produkdetail', $b->id_barang) }}">{{ $b->nama_barang }}</a>
                                        </div>

                                        <div class="toko-name mt-2">
                                            {{-- <img class="pp_toko" src="/images/post/{{ $b->foto_toko }}" alt=""> --}}
                                            <a class="nama_toko"
                                                href="{{ url('profil_toko', $b->nama_toko) }}">{{ $b->nama_toko }}
                                            </a>
                                        </div>

                                        <!-- End product name -->
                                        <!-- product price -->
                                        <div class="product-price">
                                            <span class="price">@currency($b->harga)</span>
                                        </div>
                                        <!-- End product price -->


                                    </div>

                                    <!-- End product details -->
                                </div>
                            @endforeach
                        </div>
                @endforeach
            </div>
            <!--End Recently Product Slider-->
        </div>
        <!--#ProductSection-product-template-->
    </div>
    <!--MainContent-->
    </div>
    <!--End Body Content-->

@endsection
@section('js')
    <script type="text/javascript">
        function sum() {
            var txtFirstNumberValue = document.getElementById('jumlah').value;
            if (!isNaN(txtFirstNumberValue)) {
                document.getElementById('jum').value = txtFirstNumberValue;
            }
        }
    </script>
@endsection
