@extends('marketplace.layout.layout_belanja')

@section('content')

<!--Body Content-->
    <div id="page-content">
    	<!--Collection Banner-->
    	<div class="collection-header">
			<div class="collection-hero">
        		<div class="collection-hero__image"><img class="blur-up lazyload" data-src="{{ asset('assets/marketplace/images/belanja_header.jpg') }}" src="{{ asset('assets/marketplace/images/belanja_header.jpg') }}" alt="Women" title="Women" /></div>
        		<div class="collection-hero__title-wrapper"><h1 class="collection-hero__title page-width">Belanja</h1></div>
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
                            <div class="widget-title"><h3>Kategori</h3></div>
                            <div class="widget-content">
                                <ul class="sidebar_categories">
                                    @foreach($kat as $k)
                                    <li class="lvl-1"><a href="{{ url('belanja_kat', $k->id_kategori) }}" class="site-nav">{{ $k->nama_kategori }}</a></li>
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
                                <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                	<div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="no-margin"><input id="amount" type="text" style="width: 180px;"></p>
                                    </div>
                                    <div class="col-6 text-right margin-25px-top">
                                        <button class="btn btn-secondary btn--small">filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--End Price Filter-->
                    
                        <!--Brand-->
                        <div class="sidebar_widget filterBox filter-widget">
                            <div class="widget-title"><h3>Brands</h3></div>
                            <ul>
                                <li>
                                  <input type="checkbox" value="allen-vela" id="check1">
                                  <label for="check1"><span><span></span></span>Indomie</label>
                                </li>
                                <li>
                                  <input type="checkbox" value="oxymat" id="check3">
                                  <label for="check3"><span><span></span></span>Sedap</label>
                                </li>
                                <li>
                                  <input type="checkbox" value="vanelas" id="check4">
                                  <label for="check4"><span><span></span></span>Indomilk</label>
                                </li>
                                <li>
                                  <input type="checkbox" value="pagini" id="check5">
                                  <label for="check5"><span><span></span></span>Aice</label>
                                </li>
                                <li>
                                  <input type="checkbox" value="monark" id="check6">
                                  <label for="check6"><span><span></span></span>Bango</label>
                                </li>
                            </ul>
                        </div>
                        <!--End Brand-->
                    
                        <!--Information-->
                        <div class="sidebar_widget">
                            <div class="widget-title"><h3>Information</h3></div>
                            <div class="widget-content"><p>Use this text to share information about your brand with your customers. Describe a product, share announcements, or welcome customers to your store.</p></div>
                        </div>
                        <!--end Information-->
                        <!--Product Tags-->
                        <div class="sidebar_widget">
                          <div class="widget-title">
                            <h3>Product Tags</h3>
                          </div>
                          <div class="widget-content">
                            <ul class="product-tags">
                              <li><a href="#" title="Show products matching tag Allen Vela">Indomie</a></li>
                              <li><a href="#" title="Show products matching tag Black">Sedap</a></li>
                              <li><a href="#" title="Show products matching tag Blue">Bango</a></li>
                              <li><a href="#" title="Show products matching tag Cantitate">Aqua</a></li>
                              <li><a href="#" title="Show products matching tag Famiza">Teh Pucuk</a></li>
                              <li><a href="#" title="Show products matching tag Gray">Coca Cola</a></li>
                            </ul>
                            <span class="btn btn--small btnview">View all</span> </div>
                        </div>
                        <!--end Product Tags-->
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
                                	<div class="col-4 col-md-4 col-lg-4 filters-toolbar__item collection-view-as d-flex justify-content-start align-items-center">
                                    	
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4 text-center filters-toolbar__item filters-toolbar__item--count d-flex justify-content-center align-items-center">
                                        
                                    	<span class="filters-toolbar__product-count">Showing: {{ $jumlah }}</span>
                                       
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4 text-right">
                                    	<div class="filters-toolbar__item">
                                      		<label for="SortBy" class="hidden">Sort</label>
                                      		<select name="SortBy" id="SortBy" class="filters-toolbar__input filters-toolbar__input--sort">
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
                                @foreach($barang_kat as $b)
                                <div class="col-6 col-sm-6 col-md-4 col-lg-3 item">
                                    <!-- start product image -->    
                                    <div class="product-image">
                                        <!-- start product image -->
                                        <a href="{{ url('produkdetail', $b->id_barang) }}">
                                            <!-- image -->
                                            <img class="primary blur-up lazyload" src="/images/post/{{$b->foto}}" alt="image" title="product" />
                                            <!-- End image -->
                                            <!-- Hover image -->
                                            <img class="hover blur-up lazyload" src="/images/post/{{$b->foto}}" alt="image" title="product" />
                                            <!-- End hover image -->
                                        </a>
                                        <!-- end product image -->

                                        <!-- Start product button -->
                                
                                        <div class="button-set">
                                            <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                                        <i class="icon anm anm-search-plus-r"></i>
                                                    </a>
                                            <div class="wishlist-btn">
                                                <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist">
                                                    <i class="icon anm anm-heart-l"></i>
                                                </a>
                                            </div>
                                            <div class="compare-btn">
                                                <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                                    <i class="icon anm anm-random-r"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- end product button -->
                                    </div>
                                    <!-- end product image -->

                                    <!--start product details -->
                                    <div class="product-details text-center">
                                        <!-- product name -->
                                        <div class="product-name">
                                            <a href="{{ url('produkdetail', $b->id_barang) }}">{{ $b->nama_barang }}</a>
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
                                {{-- <div class="col-6 col-sm-6 col-md-4 col-lg-3 item">
                                    <!-- start product image -->
                                    <div class="product-image">
                                        <!-- start product image -->
                                        <a href="{{ url('produkdetail') }}">
                                            <!-- image -->
                                            <img class="primary blur-up lazyload" data-src="assets/marketplace/images/product-images/indomiesoto.jpg" src="assets/marketplace/images/product-images/indomiesoto.jpg" alt="image" title="product" />
                                            <!-- End image -->
                                            <!-- Hover image -->
                                            <img class="hover blur-up lazyload" data-src="assets/marketplace/images/product-images/indomiesoto.jpg" src="assets/marketplace/images/product-images/indomiesoto.jpg" alt="image" title="product" />
                                            <!-- End hover image -->
                                            <!-- product label -->
                                            <div class="product-labels"><span class="lbl on-sale">Sale</span></div>
                                            <!-- End product label -->
                                        </a>
                                        <!-- end product image -->

                                        <!-- Start product button -->
                                        <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                            <button class="btn btn-addto-cart" type="button">Add To Cart</button>
                                        </form>
                                        <div class="button-set">
                                            <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                                        <i class="icon anm anm-search-plus-r"></i>
                                                    </a>
                                            <div class="wishlist-btn">
                                                <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist">
                                                    <i class="icon anm anm-heart-l"></i>
                                                </a>
                                            </div>
                                            <div class="compare-btn">
                                                <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                                    <i class="icon anm anm-random-r"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- end product button -->
                                    </div>
                                    <!-- end product image -->

                                    <!--start product details -->
                                    <div class="product-details text-center">
                                        <!-- product name -->
                                        <div class="product-name">
                                            <a href="{{ url('produkdetail') }}">Indomie Mie Soto <br>( 1 Karton)</a>
                                        </div>
                                        <!-- End product name -->
                                        <!-- product price -->
                                        <div class="product-price">
                                            <span class="price">Rp. 106.000</span>
                                        </div>
                                        <!-- End product price -->
                                        
                                        <div class="product-review">
                                            <i class="font-13 fa fa-star-o"></i>
                                            <i class="font-13 fa fa-star-o"></i>
                                            <i class="font-13 fa fa-star-o"></i>
                                            <i class="font-13 fa fa-star-o"></i>
                                            <i class="font-13 fa fa-star-o"></i>
                                        </div>
                                    </div>
                                    <!-- End product details -->
                                </div>
                                <div class="col-6 col-sm-6 col-md-4 col-lg-3 item grid-view-item--sold-out">
                                    <!-- start product image -->
                                    <div class="product-image">
                                        <!-- start product image -->
                                        <a href="{{ url('produkdetail') }}">
                                            <!-- image -->
                                            <img class="grid-view-item__image primary blur-up lazyload" data-src="assets/marketplace/images/product-images/luwak.jpg" src="assets/marketplace/images/product-images/luwak.jpg" alt="image" title="product" />
                                            <!-- End image -->
                                            <!-- Hover image -->
                                            <img class="grid-view-item__image hover blur-up lazyload" data-src="assets/marketplace/images/product-images/luwak.jpg" src="assets/marketplace/images/product-images/luwak.jpg" alt="image" title="product" />
                                            <!-- End hover image -->
                                            <span class="sold-out"><span>Sold out</span></span>
                                        </a>
                                    </div>
                                    <!-- end product image -->

                                    <!--start product details -->
                                    <div class="product-details text-center">
                                        <!-- product name -->
                                        <div class="product-name">
                                            <a href="{{ url('produkdetail') }}">Luwak White Coffe <br> ( 10 X 20G )</a>
                                        </div>
                                        <!-- End product name -->
                                        <!-- product price -->
                                        <div class="product-price">
                                            <span class="price">Rp. 13.000</span>
                                        </div>
                                        <!-- End product price -->
                                        
                                        <div class="product-review">
                                            <i class="font-13 fa fa-star-o"></i>
                                            <i class="font-13 fa fa-star-o"></i>
                                            <i class="font-13 fa fa-star-o"></i>
                                            <i class="font-13 fa fa-star-o"></i>
                                            <i class="font-13 fa fa-star-o"></i>
                                        </div>
                                    </div>
                                    <!-- End product details -->
                                </div>
                                <div class="col-6 col-sm-6 col-md-4 col-lg-3 item grid-view-item--sold-out">
                                    <!-- start product image -->
                                    <div class="product-image">
                                        <!-- start product image -->
                                        <a href="{{ url('produkdetail') }}">
                                            <!-- image -->
                                            <img class="grid-view-item__image primary blur-up lazyload" data-src="assets/marketplace/images/product-images/bawang.jpg" src="assets/marketplace/images/product-images/bawang.jpg" alt="image" title="product" />
                                            <!-- End image -->
                                            <!-- Hover image -->
                                            <img class="grid-view-item__image hover blur-up lazyload" data-src="assets/marketplace/images/product-images/bawang.jpg" src="assets/marketplace/images/product-images/bawang.jpg" alt="image" title="product" />
                                            <!-- End hover image -->
                                            <span class="sold-out"><span>Sold out</span></span>
                                        </a>
                                    </div>
                                    <!-- end product image -->

                                    <!--start product details -->
                                    <div class="product-details text-center">
                                        <!-- product name -->
                                        <div class="product-name">
                                            <a href="{{ url('produkdetail') }}">Bawang Merah Brebes <br>( 1 Kg )</a>
                                        </div>
                                        <!-- End product name -->
                                        <!-- product price -->
                                        <div class="product-price">
                                            <span class="price">Rp.36.000</span>
                                        </div>
                                        <!-- End product price -->
                                        
                                        <div class="product-review">
                                            <i class="font-13 fa fa-star-o"></i>
                                            <i class="font-13 fa fa-star-o"></i>
                                            <i class="font-13 fa fa-star-o"></i>
                                            <i class="font-13 fa fa-star-o"></i>
                                            <i class="font-13 fa fa-star-o"></i>
                                        </div>
                                    </div>
                                    <!-- End product details -->
                                </div> --}}
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