@extends('marketplace.layout.layout_belanja')

@section('content')

    <!--Body Content-->
    <div id="page-content">
        <!--Collection Banner-->
        <div class="collection-header">
            <div class="collection-hero">
                <div class="collection-hero__image"><img class="blur-up lazyload"
                        data-src="{{ asset('assets/marketplace/images/belanja_header.jpg') }}"
                        src="{{ asset('assets/marketplace/images/belanja_header.jpg') }}" alt="Women" title="Women" />
                </div>
                <div class="collection-hero__title-wrapper">
                    <h1 class="collection-hero__title page-width">Belanja</h1>
                </div>
            </div>
        </div>
        <!--End Collection Banner-->

        <div class="container">
            <div class="row">
                <!--Sidebar-->
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
                    <div class="closeFilter d-block d-md-none d-lg-none"><i class="icon icon anm anm-times-l"></i></div>
                    <div class="sidebar_tags">
                        <!--Categories-->
                        <div class="sidebar_widget categories filter-widget">
                            <div class="widget-title">
                                <h3>Kategori</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="sidebar_categories">
                                    @foreach ($kat as $k)
                                        <li class="lvl-1"><a href="{{ url('belanja_kat', $k->id_kategori) }}"
                                                class="site-nav">{{ $k->nama_kategori }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!--Categories-->
                        <!--Price Filter-->
                        <div class="sidebar_widget filterBox filter-widget">
                            <div class="widget-title">
                                <h3>Harga</h3>
                            </div>
                            <form action="#" method="post" class="price-filter">
                                <div id="slider-range"
                                    class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                    <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="no-margin"><input id="amount" type="text"></p>
                                    </div>
                                    <div class="col-6 text-right margin-25px-top">
                                        <button class="btn btn-secondary btn--small">filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--End Price Filter-->
                    </div>
                </div>
                <!--End Sidebar-->
                <!--Main Content-->
                <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">

                    <div class="productList product-load-more">
                        <!--Toolbar-->
                        <button type="button" class="btn btn-filter d-block d-md-none d-lg-none"> Product Filters</button>
                        <div class="toolbar">
                            <div class="filters-toolbar-wrapper">
                                <div class="row">
                                    <div
                                        class="col-4 col-md-4 col-lg-4 filters-toolbar__item collection-view-as d-flex justify-content-start align-items-center">

                                    </div>
                                    <div
                                        class="col-4 col-md-4 col-lg-4 text-center filters-toolbar__item filters-toolbar__item--count d-flex justify-content-center align-items-center">

                                        <span class="filters-toolbar__product-count">Showing: {{ $jumlah }}</span>

                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4 text-right">
                                        <div class="filters-toolbar__item">
                                            <label for="SortBy" class="hidden">Sort</label>
                                            <select name="SortBy" id="SortBy"
                                                class="filters-toolbar__input filters-toolbar__input--sort">
                                                <option value="title-ascending" selected="selected">Sort</option>
                                                <option>Best Selling</option>
                                                <option>Alphabetically, A-Z</option>
                                                <option>Alphabetically, Z-A</option>
                                                <option>Price, low to high</option>
                                                <option>Price, high to low</option>
                                                <option>Date, new to old</option>
                                                <option>Date, old to new</option>
                                            </select>
                                            <input class="collection-header__default-sort" type="hidden" value="manual">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--End Toolbar-->
                        <div class="grid-products grid--view-items">
                            <div class="row">
                                @foreach ($search as $b)
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 item">
                                        <!-- start product image -->
                                        <div class="product-image">
                                            <!-- start product image -->
                                            <a href="{{ url('produkdetail', $b->id_barang) }}">
                                                <!-- image -->
                                                <img class="primary blur-up lazyload" src="images/post/{{ $b->foto }}"
                                                    alt="image" title="product" />
                                                <!-- End image -->
                                                <!-- Hover image -->
                                                <img class="hover blur-up lazyload" src="images/post/{{ $b->foto }}"
                                                    alt="image" title="product" />
                                                <!-- End hover image -->
                                            </a>
                                            <!-- end product image -->

                                            <!-- Start product button -->
                                            <form class="variants add" action="#"
                                                onclick="window.location.href='cart.html'" method="post">
                                                <button class="btn btn-addto-cart" type="button">Add To Cart</button>
                                            </form>

                                            <form method="POST" action="{{ url('add_wishlist') }} "
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="button-set">
                                                    <input type="hidden" name="id_barang" value="{{ $b->id_barang }}">
                                                    <div class="wishlist-btn">
                                                        <button class="wishlist add-to-wishlist" type="submit"><i
                                                                class="icon anm anm-heart-l"></i></button>
                                                    </div>

                                                </div>
                                            </form>
                                            <!-- end product button -->
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
                                                <img class="pp_toko" src="/images/post/{{ $b->foto_toko }}"
                                                    alt="">
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

                                            <div class="product-review">
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                                <i class="font-13 fa fa-star"></i>
                                            </div>
                                        </div>
                                        <!-- End product details -->
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="infinitpaginOuter">
                        <div class="infinitpagin">
                            <a href="#" class="btn loadMore">Produk Lainnya</a>
                        </div>
                    </div>
                </div>
                <!--End Main Content-->
            </div>
        </div>

    </div>
    <!--End Body Content-->

@endsection
