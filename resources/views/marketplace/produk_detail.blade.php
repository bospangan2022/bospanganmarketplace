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
                                        <div class="product-labels"><span class="lbl on-sale">Sale</span><span
                                                class="lbl pr-label1">new</span></div>
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
                                                class="outstock hide">Unavailable</span> </div>
                                        <div class="product-sku">SKU: <span
                                                class="variant-sku">{{ $bi->sku }}</span></div>
                                        <!-- <div class="product-review"><a class="reviewLink" href="#tab2"><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i><span class="spr-badge-caption">6 reviews</span></a></div> -->
                                    </div>
                                    <p class="product-single__price product-single__price-product-template">
                                        <span class="visually-hidden">Regular price</span>
                                        <s id="ComparePrice-product-template"><span
                                                class="money">@currency(110000)</span></s>
                                        <span
                                            class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                            <span id="ProductPrice-product-template"><span
                                                    class="money">@currency($bi->harga)</span></span>
                                        </span>
                                        <span class="discount-badge"> <span class="devider">|</span>&nbsp;
                                            <span>Anda Hemat</span>
                                            <span id="SaveAmount-product-template" class="product-single__save-amount">
                                                <span class="money">@currency(4000)</span>
                                            </span>
                                            <span class="off">(<span>1</span>%)</span>
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
                                    <p>{{ $bi->keterangan }}</p>
                                </div>
                                <div id="quantity_message">Cepat! Hanya Tinggal <span
                                        class="items">{{ $bi->stok }}</span> Stock.</div>
                                <!-- <form method="post" action="http://annimexweb.com/cart/add" id="product_form_10508262282" accept-charset="UTF-8" class="product-form product-form-product-template hidedropdown" enctype="multipart/form-data"> -->

                                <!-- Product Action -->
                                <div class="product-action clearfix">
                                    <form action="{{ url('add_cart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $bi->id_barang }}" name="id_barang">
                                        <input type="hidden" value="{{ $bi->id_toko }}" name="id_toko">
                                        <input type="hidden" value="{{ $bi->harga }}" name="harga">
                                        <div class="product-form__item--quantity">
                                            <div class="wrapQtyBtn">
                                                <div class="qtyField">
                                                    <a class="qtyBtn minus" href="javascript:void(0);"><i
                                                            class="icon icon-minus" aria-hidden="true"></i></a>
                                                    <input type="text" id="Quantity" name="jumlah" value="1"
                                                        class="product-form__input qty">
                                                    <a class="qtyBtn plus" href="javascript:void(0);"><i
                                                            class="icon icon-plus" aria-hidden="true"></i></a>
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
                                        <form action="{{ url('checkoutperitem', $bi->id_barang) }}" method="post"></form>
                                        @csrf
                                        <button type="submit"
                                            class="shopify-payment-button__button shopify-payment-button__button--unbranded">Beli
                                            Sekarang</button>
                                        </form>
                                    </div>

                                </div>
                                <!-- End Product Action -->
                                <!-- </form> -->
                                <div class="display-table shareRow">
                                    <div class="display-table-cell medium-up--one-third">
                                        <div class="wishlist-btn">
                                            <a class="wishlist add-to-wishlist" href="{{ url('wishlist') }}"
                                                title="Add to Wishlist"><i class="icon anm anm-heart-l"
                                                    aria-hidden="true"></i> <span>Add to Wishlist</span></a>
                                        </div>
                                    </div>
                                </div>

                                <p id="freeShipMsg" class="freeShipMsg" data-price="199"><i class="fa fa-truck"
                                        aria-hidden="true"></i> GRATIS ONGKIR <b>SELURUH PULAU JAWA!</b></p>
                                <p class="shippingMsg"><i class="fa fa-clock-o" aria-hidden="true"></i> ESTIMASI <b
                                        id="fromDate">Kamis May 1</b> dan <b id="toDate">Rabu May 7</b>.</p>
                                <div class="userViewMsg" data-user="20" data-time="11000"><i class="fa fa-users"
                                        aria-hidden="true"></i> <strong class="uersView">14</strong> ORANG SEDANG
                                    MELIHAT PRODUK INI</div>
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
                        {{-- <li rel="tab2"><a class="tablink">Product Reviews</a></li> --}}
                        <li rel="tab4"><a class="tablink">Shipping &amp; Returns</a></li>
                    </ul>
                    <div class="tab-container">
                        <div id="tab1" class="tab-content">
                            <div class="product-description rte">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled it to make a type specimen book. It has
                                    survived not only five centuries, but also the leap into electronic typesetting,
                                    remaining essentially unchanged.</p>
                                <ul>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                                    <li>Sed ut perspiciatis unde omnis iste natus error sit</li>
                                    <li>Neque porro quisquam est qui dolorem ipsum quia dolor</li>
                                    <li>Lorem Ipsum is not simply random text.</li>
                                    <li>Free theme updates</li>
                                </ul>
                                <h3>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</h3>
                                <p>You can change the position of any sections such as slider, banner, products, collection
                                    and so on by just dragging and dropping.&nbsp;</p>
                                <h3>Lorem Ipsum is not simply random text.</h3>
                                <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising
                                    pain was born and I will give you a complete account of the system, and expound the
                                    actual teachings of the great explorer of the truth, the master-builder of human
                                    happiness.</p>
                                <p>Change colors, fonts, banners, megamenus and more. Preview changes are live before saving
                                    them.</p>
                                <h3>1914 translation by H. Rackham</h3>
                                <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising
                                    pain was born and I will give you a complete account of the system, and expound the
                                    actual teachings of the great explorer of the truth, the master-builder of human
                                    happiness.</p>
                                <h3>Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h3>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                    voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint
                                    occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt
                                    mollitia animi, id est laborum et dolorum fuga.</p>
                                <h3>The standard Lorem Ipsum passage, used since the 1500s</h3>
                                <p>You can use variant style from colors, images or variant images. Also available differnt
                                    type of design styles and size.</p>
                                <h3>Lorem Ipsum is not simply random text.</h3>
                                <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising
                                    pain was born and I will give you a complete account of the system, and expound the
                                    actual teachings of the great explorer of the truth, the master-builder of human
                                    happiness.</p>
                                <h3>Proin ut lacus eget elit molestie posuere.</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled.</p>
                            </div>
                        </div>

                        <div id="tab2" class="tab-content">
                            <div id="shopify-product-reviews">
                                <div class="spr-container">
                                    <div class="spr-header clearfix">
                                        <div class="spr-summary">
                                            <span class="product-review"><a class="reviewLink"><i
                                                        class="font-13 fa fa-star"></i><i
                                                        class="font-13 fa fa-star"></i><i
                                                        class="font-13 fa fa-star"></i><i
                                                        class="font-13 fa fa-star-o"></i><i
                                                        class="font-13 fa fa-star-o"></i> </a><span
                                                    class="spr-summary-actions-togglereviews">Based on 6
                                                    reviews456</span></span>
                                            <span class="spr-summary-actions">
                                                <a href="#" class="spr-summary-actions-newreview btn">Write a review</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="spr-content">
                                        <div class="spr-form clearfix">
                                            <form method="post" action="#" id="new-review-form" class="new-review-form">
                                                <h3 class="spr-form-title">Write a review</h3>
                                                <fieldset class="spr-form-contact">
                                                    <div class="spr-form-contact-name">
                                                        <label class="spr-form-label"
                                                            for="review_author_10508262282">Name</label>
                                                        <input class="spr-form-input spr-form-input-text "
                                                            id="review_author_10508262282" type="text" name="review[author]"
                                                            value="" placeholder="Enter your name">
                                                    </div>
                                                    <div class="spr-form-contact-email">
                                                        <label class="spr-form-label"
                                                            for="review_email_10508262282">Email</label>
                                                        <input class="spr-form-input spr-form-input-email "
                                                            id="review_email_10508262282" type="email" name="review[email]"
                                                            value="" placeholder="john.smith@example.com">
                                                    </div>
                                                </fieldset>
                                                <fieldset class="spr-form-review">
                                                    <div class="spr-form-review-rating">
                                                        <label class="spr-form-label">Rating</label>
                                                        <div class="spr-form-input spr-starrating">
                                                            <div class="product-review"><a class="reviewLink"
                                                                    href="#"><i class="fa fa-star-o"></i><i
                                                                        class="font-13 fa fa-star-o"></i><i
                                                                        class="font-13 fa fa-star-o"></i><i
                                                                        class="font-13 fa fa-star-o"></i><i
                                                                        class="font-13 fa fa-star-o"></i></a></div>
                                                        </div>
                                                    </div>

                                                    <div class="spr-form-review-title">
                                                        <label class="spr-form-label" for="review_title_10508262282">Review
                                                            Title</label>
                                                        <input class="spr-form-input spr-form-input-text "
                                                            id="review_title_10508262282" type="text" name="review[title]"
                                                            value="" placeholder="Give your review a title">
                                                    </div>

                                                    <div class="spr-form-review-body">
                                                        <label class="spr-form-label" for="review_body_10508262282">Body of
                                                            Review <span
                                                                class="spr-form-review-body-charactersremaining">(1500)</span></label>
                                                        <div class="spr-form-input">
                                                            <textarea class="spr-form-input spr-form-input-textarea "
                                                                id="review_body_10508262282" data-product-id="10508262282"
                                                                name="review[body]" rows="10"
                                                                placeholder="Write your comments here"></textarea>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="spr-form-actions">
                                                    <input type="submit"
                                                        class="spr-button spr-button-primary button button-primary btn btn-primary"
                                                        value="Submit Review">
                                                </fieldset>
                                            </form>
                                        </div>
                                        <div class="spr-reviews">
                                            <div class="spr-review">
                                                <div class="spr-review-header">
                                                    <span
                                                        class="product-review spr-starratings spr-review-header-starratings"><span
                                                            class="reviewLink"><i class="fa fa-star"></i><i
                                                                class="font-13 fa fa-star"></i><i
                                                                class="font-13 fa fa-star"></i><i
                                                                class="font-13 fa fa-star"></i><i
                                                                class="font-13 fa fa-star"></i></span></span>
                                                    <h3 class="spr-review-header-title">Lorem ipsum dolor sit amet</h3>
                                                    <span class="spr-review-header-byline"><strong>dsacc</strong> on
                                                        <strong>Apr 09, 2019</strong></span>
                                                </div>
                                                <div class="spr-review-content">
                                                    <p class="spr-review-content-body">Lorem ipsum dolor sit amet,
                                                        consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                        consequat.</p>
                                                </div>
                                            </div>
                                            <div class="spr-review">
                                                <div class="spr-review-header">
                                                    <span
                                                        class="product-review spr-starratings spr-review-header-starratings"><span
                                                            class="reviewLink"><i class="fa fa-star"></i><i
                                                                class="font-13 fa fa-star"></i><i
                                                                class="font-13 fa fa-star"></i><i
                                                                class="font-13 fa fa-star"></i><i
                                                                class="font-13 fa fa-star"></i></span></span>
                                                    <h3 class="spr-review-header-title">Lorem Ipsum is simply dummy text of
                                                        the printing</h3>
                                                    <span class="spr-review-header-byline"><strong>larrydude</strong> on
                                                        <strong>Dec 30, 2018</strong></span>
                                                </div>

                                                <div class="spr-review-content">
                                                    <p class="spr-review-content-body">Sed ut perspiciatis unde omnis iste
                                                        natus error sit voluptatem accusantium doloremque laudantium, totam
                                                        rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                                        architecto beatae vitae dicta sunt explicabo.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="spr-review">
                                                <div class="spr-review-header">
                                                    <span
                                                        class="product-review spr-starratings spr-review-header-starratings"><span
                                                            class="reviewLink"><i class="fa fa-star"></i><i
                                                                class="font-13 fa fa-star"></i><i
                                                                class="font-13 fa fa-star"></i><i
                                                                class="font-13 fa fa-star"></i><i
                                                                class="font-13 fa fa-star"></i></span></span>
                                                    <h3 class="spr-review-header-title">Neque porro quisquam est qui
                                                        dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...
                                                    </h3>
                                                    <span class="spr-review-header-byline"><strong>quoctri1905</strong> on
                                                        <strong>Dec 30, 2018</strong></span>
                                                </div>

                                                <div class="spr-review-content">
                                                    <p class="spr-review-content-body">Lorem Ipsum is simply dummy text of
                                                        the printing and typesetting industry. Lorem Ipsum has been the
                                                        industry's standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled.<br>
                                                        <br>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                        industry.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div id="tab4" class="tab-content">
                            <h4>Returns Policy</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eros justo, accumsan non dui
                                sit amet. Phasellus semper volutpat mi sed imperdiet. Ut odio lectus, vulputate non ex non,
                                mattis sollicitudin purus. Mauris consequat justo a enim interdum, in consequat dolor
                                accumsan. Nulla iaculis diam purus, ut vehicula leo efficitur at.</p>
                            <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. In blandit nunc enim, sit amet
                                pharetra erat aliquet ac.</p>
                            <h4>Shipping</h4>
                            <p>Pellentesque ultrices ut sem sit amet lacinia. Sed nisi dui, ultrices ut turpis pulvinar. Sed
                                fringilla ex eget lorem consectetur, consectetur blandit lacus varius. Duis vel scelerisque
                                elit, et vestibulum metus. Integer sit amet tincidunt tortor. Ut lacinia ullamcorper massa,
                                a fermentum arcu vehicula ut. Ut efficitur faucibus dui Nullam tristique dolor eget turpis
                                consequat varius. Quisque a interdum augue. Nam ut nibh mauris.</p>
                        </div>
                    </div>
                </div>
                <!--End Product Tabs-->



                <!--Recently Product Slider-->
                <div class="related-product grid-products">
                    <header class="section-header">
                        <h2 class="section-header__title text-center h2"><span>Produk Lainnya</span></h2>
                        <p class="sub-heading">Produk lain yang ada di toko kami</p>
                    </header>
                    <div class="productPageSlider">
                        @foreach ($barang as $b)
                            <div class="col-12 item">
                                <!-- start product image -->
                                <div class="product-image">
                                    <!-- start product image -->

                                    <a href="{{ url('produkdetail', $b->id_barang) }}">
                                        <!-- image -->
                                        <img class="primary blur-up lazyload" data-src="/images/post/{{ $b->foto }}"
                                            src="/images/post/{{ $b->foto }}" alt="image" title="product">
                                        <!-- End image -->
                                        <!-- Hover image -->
                                        <img class="hover blur-up lazyload" data-src="/images/post/{{ $b->foto }}"
                                            src="/images/post/{{ $b->foto }}" alt="image" title="product">
                                        <!-- End hover image -->
                                        <!-- product label -->
                                        <div class="product-labels rectangular"><span class="lbl on-sale">-16%</span>
                                            <span class="lbl pr-label1">new</span>
                                        </div>
                                        <!-- End product label -->
                                    </a>
                                    <!-- end product image -->
                                </div>
                                <!-- end product image -->

                                <!--start product details -->
                                <div class="product-details text-center">
                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="{{ url('produkdetail', $b->id_barang) }}">{{ $b->nama_barang }}</a>
                                    </div>
                                    <!-- End product name -->
                                </div>
                                <!-- End product details -->
                            </div>
                        @endforeach

                    </div>
                </div>
                <!--End Recently Product Slider-->
            </div>
            <!--#ProductSection-product-template-->
        </div>
        <!--MainContent-->
    </div>
    <!--End Body Content-->

@endsection
