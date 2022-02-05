@extends('marketplace.layout.layout_wishlist')

@section('content')

    <div id="page-content">
        <!--Page Title-->
        <div class="page section-header text-center">
            <div class="page-title">
                <div class="wrapper">
                    <h1 class="page-width">Wishlist</h1>
                </div>
            </div>
        </div>
        <!--End Page Title-->

        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                    <div class="wishlist-table table-content table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product-name text-center alt-font">Hapus</th>
                                    <th class="product-price text-center alt-font">Produk</th>
                                    <th class="product-name alt-font">Nama Produk</th>
                                    <th class="product-price text-center alt-font">Harga</th>
                                    <th class="product-subtotal text-center alt-font">Add to Cart</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishlist as $w)
                                    <tr>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" method="POST"
                                            action="{{ url('delete_wishlist', $w->id_wishlist) }}">
                                            @csrf
                                            <td class="hapus-wishlist text-center" valign="middle"><button
                                                    class="btn-delete-wishlist" type="submit"><i
                                                        class="icon icon anm anm-times-l"></i></button></td>
                                        </form>

                                        <td class="product-thumbnail text-center">
                                            <a href="#"><img src="images/post/{{ $w->foto }}" alt="" title="" /></a>
                                        </td>
                                        <td class="product-name">
                                            <h4 class="no-margin">
                                                <a class="nm_produk" href="{{ url('produkdetail', $w->id_barang) }}">
                                                    {{ $w->nama_barang }}
                                                </a>
                                                <br>
                                                <a class="nm_toko" href="{{ url('profil_toko', $w->nama_toko) }}">
                                                    {{ $w->nama_toko }}
                                                </a>
                                            </h4>
                                        </td>
                                        <td class="product-price text-center"><span
                                                class="amount">@currency($w->harga)</span></td>
                                        <form action="{{ url('add_cart') }}" method="POST">
                                            @csrf
                                            <td class="product-subtotal text-center">
                                                <input type="hidden" name="id_barang" value="{{ $w->id_barang }}">
                                                <input type="hidden" name="harga" value="{{ $w->harga }}">
                                                <input type="hidden" name="jumlah" value="1">
                                                <button type="submit" class="btn btn-small">Add To Cart</button>
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
