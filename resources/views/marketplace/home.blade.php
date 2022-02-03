@extends('marketplace.layout.layout')

@section('content')

<div id="page-content">
    	<!--Home slider-->
    	<div class="slideshow slideshow-wrapper pb-section">
        	<div class="home-slideshow">
            	<div class="slide">
                	<div class="blur-up lazyload">
                        <img class="blur-up lazyload" data-src="{{ asset('assets/marketplace/images/slideshow-banners/slide2.jpg') }}" src="{{ asset('assets/marketplace/images/slideshow-banners/slide2.jpg') }}" alt="Shop Our New Collection" title="Shop Our New Collection" />
                        <div class="slideshow__text-wrap slideshow__overlay classic middle">
                            <div class="slideshow__text-content middle">
                            	<div class="container">
                                    <div class="wrap-caption center">
                                        <h2 class="h1 mega-title slideshow__title">Bos Pangan Marketplace</h2>
                                        <span class="mega-subtitle slideshow__subtitle">Masalah Pangan Beres</span>
                                        <span class="btn">Shop now</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide">
                	<div class="blur-up lazyload">
                        <img class="blur-up lazyload" data-src="{{ asset('assets/marketplace/images/slideshow-banners/slide3.jpg') }}" src="{{ asset('assets/marketplace/images/slideshow-banners/slide3.jpg') }}" alt="Summer Bikini Collection" title="Summer Bikini Collection" />
                        <div class="slideshow__text-wrap slideshow__overlay classic middle">
                            <div class="slideshow__text-content middle">
                            	<div class="container">
                                    <div class="wrap-caption center">
                                        <h2 class="h1 mega-title slideshow__title">Kebutuhan Anda Tersedia Disini</h2>
                                        <span class="mega-subtitle slideshow__subtitle">Tersedia Mulai Dari Sayuran, Buah-Buahan, dan lain-lain</span>
                                        <span class="btn"> Shop now</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Home slider-->
        <!--Weekly Bestseller-->
        <div class="section">
        	<div class="container">
            	<div class="row">
                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                            <h2 class="h2">Kategori</h2>
                            <p>Kategori barang yang kami sediakan</p>
                        </div>
                    </div>
            	</div>    
            </div>
        </div>

        <!--Collection Box slider-->
        <div class="collection-box section">
        <div class="container-fluid">
            <div class="collection-grid">
                @foreach($kategori as $kat)
                <div class="collection-grid-item">
                    <a
                    href="{{ url('belanja_kat', $kat->id_kategori) }}"
                    class="collection-grid-item__link"
                    >
                    <img
                        data-src="/images/post/{{ $kat->foto }}"
                        src="/images/post/{{ $kat->foto }}"
                        alt="Fashion"
                        class="blur-up lazyload"
                    />
                    <div class="collection-grid-item__title-wrapper">
                        <h3
                        class="
                            collection-grid-item__title
                            btn btn--secondary
                            no-border
                        "
                        >
                        {{ $kat->nama_kategori }}
                        </h3>
                    </div>
                    </a>
                </div>
                @endforeach
                {{-- <div class="collection-grid-item">
                    <a
                    href="collection-page.html"
                    class="collection-grid-item__link"
                    >
                    <img
                        class="blur-up lazyload"
                        data-src="{{ asset('assets/marketplace/images/kategori/sayuran.jpg') }}"
                        src="{{ asset('assets/marketplace/images/kategori/sayuran.jpg') }}"
                        alt="Sayuran"
                    />
                    <div class="collection-grid-item__title-wrapper">
                        <h3
                        class="
                            collection-grid-item__title
                            btn btn--secondary
                            no-border
                        "
                        >
                        Sayuran
                        </h3>
                    </div>
                    </a>
                </div>
                <div class="collection-grid-item blur-up lazyloaded">
                    <a
                    href="collection-page.html"
                    class="collection-grid-item__link"
                    >
                    <img
                        data-src="{{ asset('assets/marketplace/images/kategori/lauk.jpg') }}"
                        src="{{ asset('assets/marketplace/images/kategori/lauk.jpg') }}"
                        alt="Lauk"
                        class="blur-up lazyload"
                    />
                    <div class="collection-grid-item__title-wrapper">
                        <h3
                        class="
                            collection-grid-item__title
                            btn btn--secondary
                            no-border
                        "
                        >
                        Lauk Pauk
                        </h3>
                    </div>
                    </a>
                </div>
                <div class="collection-grid-item">
                    <a
                    href="collection-page.html"
                    class="collection-grid-item__link"
                    >
                    <img
                        data-src="{{ asset('assets/marketplace/images/kategori/minuman.jpg') }}"
                        src="{{ asset('assets/marketplace/images/kategori/minuman.jpg') }}"
                        alt="Minuman"
                        class="blur-up lazyload"
                    />
                    <div class="collection-grid-item__title-wrapper">
                        <h3
                        class="
                            collection-grid-item__title
                            btn btn--secondary
                            no-border
                        "
                        >
                        Minuman
                        </h3>
                    </div>
                    </a>
                </div>
                <div class="collection-grid-item">
                    <a
                    href="collection-page.html"
                    class="collection-grid-item__link"
                    >
                    <img
                        data-src="{{ asset('assets/marketplace/images/kategori/seafood.jpg') }}"
                        src="{{ asset('assets/marketplace/images/kategori/seafood.jpg') }}"
                        alt="Seafood"
                        class="blur-up lazyload"
                    />
                    <div class="collection-grid-item__title-wrapper">
                        <h3
                        class="
                            collection-grid-item__title
                            btn btn--secondary
                            no-border
                        "
                        >
                        Ikan & Seafood
                        </h3>
                    </div>
                    </a>
                </div>
                <div class="collection-grid-item">
                    <a
                    href="collection-page.html"
                    class="collection-grid-item__link"
                    >
                    <img
                        data-src="{{ asset('assets/marketplace/images/kategori/snack.jpg') }}"
                        src="{{ asset('assets/marketplace/images/kategori/snack.jpg') }}"
                        alt="Snack"
                        class="blur-up lazyload"
                    />
                    <div class="collection-grid-item__title-wrapper">
                        <h3
                        class="
                            collection-grid-item__title
                            btn btn--secondary
                            no-border
                        "
                        >
                        Snack
                        </h3>
                    </div>
                    </a>
                </div> --}}
            </div>
        </div>
        </div>
        <!--End Collection Box slider-->
        <!--Weekly Bestseller-->
        <!--New Arrivals-->
        <div class="product-rows section">
        	<div class="container">
            	<div class="row">
                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
        				<div class="section-header text-center">
                            <h2 class="h2">Best Seller</h2>
                            <p>Barang-barang yang banyak dibeli di Bos Pangan Marketplace</p>
                        </div>
            		</div>
                </div>
	            <div class="grid-products">
                    <div class="row">
                        @foreach($barang as $b)
                    	<div class="col-6 col-sm-2 col-md-3 col-lg-3 item">
                            <div class="product-image">
                                <!--start product image -->
                                <a href="{{ url('produkdetail', $b->id_barang) }}" class="grid-view-item__link">
                                    <!-- image -->
                                    <img class="primary blur-up lazyload" data-src="images/post/{{$b->foto}}" alt="image" title="product" />
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="hover blur-up lazyload" data-src="images/post/{{$b->foto}}" src="images/post/{{$b->foto}}" alt="image" title="product" />
                                    <!-- End hover image -->
                                </a>
                                <!-- end product image -->
                                <!-- product button -->
                               
     
                                <form method="POST" action="{{ url('add_wishlist') }} " enctype="multipart/form-data" >
                                    @csrf
                                    <div class="button-set">
                                        <input type="hidden" name="id_barang" value="{{ $b->id_barang }}">
                                        <div class="wishlist-btn">
                                            <button class="wishlist add-to-wishlist" type="submit"><i class="icon anm anm-heart-l"></i></button>
                                        </div>
                                        
                                    </div>
                                </form>
                                <!-- End product button -->
                            </div>
                            <!--End start product image -->
                                
                            <!--start product details -->
                            <div class="product-details text-center">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="x.html">{{ $b->nama_barang }}</a>
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
                    	{{-- <div class="col-6 col-sm-2 col-md-3 col-lg-3 item">
                            <div class="product-image">
                                <!--start product image -->
                                <a href="produk_detail.html" class="grid-view-item__link">
                                    <!-- image -->
                                    <img class="primary blur-up lazyload" data-src="{{ asset('assets/marketplace/images/product-images/indomiesoto.jpg') }}" src="{{ asset('assets/marketplace/images/product-images/indomiesoto.jpg') }}" alt="image" title="product" />
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="hover blur-up lazyload" data-src="{{ asset('assets/marketplace/images/product-images/indomiesoto.jpg') }}" src="{{ asset('assets/marketplace/images/product-images/indomiesoto.jpg') }}" alt="image" title="product" />
                                    <!-- End hover image -->
                                </a>
                                <!-- end product image -->
                                <!-- product button -->
                                <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                    <button class="btn btn-addto-cart" type="button" tabindex="0">Add To Cart</button>
                                </form>
                                <div class="button-set">
                                     <!-- <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                            <i class="icon anm anm-search-plus-r"></i>
                                        </a> -->
                                    <!-- Start product button -->
                                    <div class="wishlist-btn">
                                        <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist">
                                            <i class="icon anm anm-heart-l"></i>
                                        </a>
                                    </div>
                                    
                                </div>
                                <!-- End product button -->
                            </div>
                            <!--End start product image -->
                                
                            <!--start product details -->
                            <div class="product-details text-center">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="produk_detail.html">Indomie Soto Mie ( 1 Karton )</a>
                                </div>
                                <!-- End product name -->
                                <!-- product price -->
                                <div class="product-price">
                                    <span class="price">RP. 105.000</span>
                                </div>
                                <!-- End product price -->
                            </div>
                            <!-- End product details -->
                        </div>
                    	<div class="col-6 col-sm-2 col-md-3 col-lg-3 item">
                            <div class="product-image">
                                <!--start product image -->
                                <a href="produk_detail.html" class="grid-view-item__link">
                                    <!-- image -->
                                    <img class="primary blur-up lazyload" data-src="{{ asset('assets/marketplace/images/product-images/luwak.jpg') }}" src="{{ asset('assets/marketplace/images/product-images/luwak.jpg') }}" alt="image" title="product" />
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="hover blur-up lazyload" data-src="{{ asset('assets/marketplace/images/product-images/luwak.jpg') }}" src="{{ asset('assets/marketplace/images/product-images/luwak.jpg') }}" alt="image" title="product" />
                                    <!-- End hover image -->
                                </a>
                                <!-- end product image -->
                                <!-- product button -->
                                <form method="POST" action="{{ url('add_wishlist') }} " enctype="multipart/form-data" >
                                    @csrf
                                    <div class="button-set">
                                        <input type="hidden" name="id_barang" value="{{ $b->id_barang }}">
                                        <div class="wishlist-btn">
                                            <button class="wishlist add-to-wishlist" type="submit"><i class="icon anm anm-heart-l"></i></button>
                                        </div>
                                        
                                    </div>
                                </form>
                                <div class="button-set">
                                     <!-- <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                            <i class="icon anm anm-search-plus-r"></i>
                                        </a> -->
                                    <!-- Start product button -->
                                    <div class="wishlist-btn">
                                        <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist">
                                            <i class="icon anm anm-heart-l"></i>
                                        </a>
                                    </div>
                                    
                                </div>
                                <!-- End product button -->
                            </div>
                            <!--End start product image -->
                                
                            <!--start product details -->
                            <div class="product-details text-center">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="produk_detail.html">Luwak White Coffe</a>
                                </div>
                                <!-- End product name -->
                                <!-- product price -->
                                <div class="product-price">
                                    <span class="price">Rp. 13.000</span>
                                </div>
                                <!-- End product price -->
                            </div>
                            <!-- End product details -->
                        </div>
                    	<div class="col-6 col-sm-2 col-md-3 col-lg-3 item">
                            <div class="product-image">
                                <!--start product image -->
                                <a href="produk_detail.html" class="grid-view-item__link">
                                    <!-- image -->
                                    <img class="primary blur-up lazyload" data-src="{{ asset('assets/marketplace/images/product-images/bawang.jpg') }}" src="{{ asset('assets/marketplace/images/product-images/bawang.jpg') }}" alt="image" title="product" />
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="hover blur-up lazyload" data-src="{{ asset('assets/marketplace/images/product-images/bawang.jpg') }}" src="{{ asset('assets/marketplace/images/product-images/bawang.jpg') }}" alt="image" title="product" />
                                    <!-- End hover image -->
                                </a>
                                <!-- end product image -->
                                <!-- product button -->
                                <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                    <button class="btn btn-addto-cart" type="button" tabindex="0">Add To Cart</button>
                                </form>
                                <div class="button-set">
                                     <!-- <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                            <i class="icon anm anm-search-plus-r"></i>
                                        </a> -->
                                    <!-- Start product button -->
                                    <div class="wishlist-btn">
                                        <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist">
                                            <i class="icon anm anm-heart-l"></i>
                                        </a>
                                    </div>
                                    
                                </div>
                                <!-- End product button -->
                            </div>
                            <!--End start product image -->
                                
                            <!--start product details -->
                            <div class="product-details text-center">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="produk_detail.html">Bawang Merah Brebes ( 1 Kg )</a>
                                </div>
                                <!-- End product name -->
                                <!-- product price -->
                                <div class="product-price">
                                    <span class="price">Rp. 36. 000</span>
                                </div>
                                <!-- End product price -->
                            </div>
                            <!-- End product details -->
                        </div> --}}
                        
						
                    </div>
                    <div class="row">
                    	<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
                        	<a href="{{ url('belanja') }}" class="btn">View all</a>
                        </div>
                    </div>
                </div>
           </div>
        </div>	
        <!--End Featured Product-->
    </div>

@endsection