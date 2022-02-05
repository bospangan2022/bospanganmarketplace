<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
?>
@extends('marketplace.layout.layout_cart')

@section('content')

    <!--Body Content-->
    <div id="page-content">
        <!--Page Title-->
        <div class="page section-header text-center">
            <div class="page-title">
                <div class="wrapper">
                    <h1 class="page-width">Shopping Cart</h1>
                </div>
            </div>
        </div>
        <!--End Page Title-->

        <div class="container">
            <div class="row">
                @foreach ($toko as $tk)
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                        <table class="cart style2">
                            <thead class="cart__row cart__header">
                                <tr>
                                    <th colspan="9" class="text-left"><a
                                            href="{{ url('profil_toko', $tk->id_toko) }}">{{ $tk->nama_toko }} ></a>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="text-left">
                                        <div class="form-check">
                                            <input class="form-check-input text-" type="checkbox" value=""
                                                id="flexCheckChecked" onClick="toggle(this)">
                                            <label class="form-check-label ml-3" for="flexCheckChecked">
                                                All
                                            </label>
                                        </div>
                                    </th>
                                    <th colspan="2" class="text-center">Produk</th>
                                    <th class="text-center">Nama Toko</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-right">Total</th>
                                    <th class="action" colspan="2">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                $keranjang = DB::table('tb_barang')
                                    ->join('tb_toko', 'tb_barang.id_toko', '=', 'tb_toko.id_toko')
                                    ->join('tb_keranjang', 'tb_barang.id_barang', '=', 'tb_keranjang.id_barang')
                                    ->where('tb_keranjang.id_user', Auth::user()->id)
                                    ->where('tb_keranjang.id_toko', $tk->id_toko)
                                    ->where('tb_keranjang.status', 't')
                                    ->orderBy('tb_keranjang.id_keranjang', 'ASC')
                                    ->get();
                                ?>
                                @foreach ($keranjang as $krj)
                                    <tr class="cart__row border-bottom line1 cart-flex border-top">
                                        <td class="cart__meta pl-3 text-center">
                                            <input class="form-check-input" type="checkbox" value="{{ $krj->id_barang }}"
                                                id="flexCheckDefault" name="foo">
                                        </td>
                                        <td class="cart__image-wrapper cart-flex-item">
                                            <a href="{{ url('produkdetail', $krj->id_barang) }}"><img
                                                    class="cart__image" src="/images/post/{{ $krj->foto }}"
                                                    alt="Elastic Waist Dress - Navy / Small"></a>
                                        </td>
                                        <td class="cart__meta small--text-left cart-flex-item">
                                            <div class="list-view-item__title">
                                                <a href="{{ url('produkdetail', $krj->id_barang) }}">{{ $krj->nama_barang }}
                                                </a>
                                            </div>

                                            <div class="cart__meta-text">
                                                {{ $krj->keterangan }}
                                            </div>
                                        </td>
                                        <td class="cart__price-wrapper cart-flex-item">
                                            <span class="money">{{ $krj->nama_toko }}</span>
                                        </td>
                                        <td class="cart__price-wrapper cart-flex-item">
                                            <span class="money">@currency($krj->harga)</span>
                                        </td>
                                        <form action="{{ url('update_cart', $krj->id_keranjang) }}" method="POST">
                                            @csrf
                                            <td class="cart__update-wrapper cart-flex-item text-right">
                                                <div class="cart__qty text-center">
                                                    <div class="qtyField">
                                                        <a class="qtyBtn minus" href="javascript:void(0);"><i
                                                                class="icon icon-minus"></i></a>
                                                        <input class="cart__qty-input qty" type="text" name="jumlah"
                                                            id="qty" value="{{ $krj->jumlah }}" pattern="[0-9]*">
                                                        <a class="qtyBtn plus" href="javascript:void(0);"><i
                                                                class="icon icon-plus"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right small--hide cart-price">
                                                <input type="hidden" name="sub_harga" value="{{ $krj->sub_harga }}">
                                                <input type="hidden" name="harga" value="{{ $krj->harga }}">
                                                <div><span class="money">@currency($krj->sub_harga)</span></div>
                                            </td>
                                            <td class="text-center small--hide" colspan="2"><a
                                                    href="{{ url('remove_cart', $krj->id_keranjang) }}"
                                                    class="btn btn--secondary cart__remove" title="Remove tem"><i
                                                        class="icon icon anm anm-times-l"></i></a>

                                                <button type="submit" class="btn btn--secondary cart__remove"><i
                                                        class="anm anm-edit"></i></button>
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-left"><a href="{{ url('belanja') }}"
                                            class="btn btn-secondary btn--small cart-continue">Lanjutkan Belanja</a></td>
                                    <td colspan="5" class="text-right">
                                        <a href="{{ url('remove_cartall', $tk->id_toko) }}" type="submit" name="clear"
                                            class="btn btn-secondary btn--small  small--hide">Clear Cart</a>
                                    </td>
                                    <td colspan="5" class="text-right">
                                        <a href="{{ url('remove_cartall') }}" type="submit" name="clear"
                                            class="btn btn-secondary btn--small  small--hide">Checkout</a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                @endforeach



            </div>
        </div>

    </div>
    <!--End Body Content-->


@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".js-example-basic-single").select2();
        });
    </script>

    <script>
        $('#kota').change(function() {
            var koID = $(this).val();
            if (koID) {
                $.ajax({
                    type: "GET",
                    url: "getKec?id_kota=" + koID,
                    dataType: 'JSON',
                    success: function(res) {
                        if (res) {
                            $("#kecamatan").empty();
                            $("#kecamatan").append('<option>---Pilih Kecamatan---</option>');
                            $.each(res, function(nama, kode) {
                                $("#kecamatan").append('<option value="' + kode + '">' + nama +
                                    '</option>');
                            });
                        } else {
                            $("#kecamatan").empty();
                        }
                    }
                });
            } else {
                $("#kecamatan").empty();
            }
        });
        $('#kecamatan').change(function() {
            var kecID = $(this).val();
            if (kecID) {
                $.ajax({
                    type: "GET",
                    url: "getDesa?id_kecamatan=" + kecID,
                    dataType: 'JSON',
                    success: function(res) {
                        if (res) {
                            $("#desa").empty();
                            $("#desa").append('<option>---Pilih Kelurahan/Desa---</option>');
                            $.each(res, function(nama, kode) {
                                $("#desa").append('<option value="' + kode + '">' + nama +
                                    '</option>');
                            });
                        } else {
                            $("#desa").empty();
                        }
                    }
                });
            } else {
                $("#desa").empty();
            }
        });
    </script>

    <script language="JavaScript">
        function toggle(source) {
            checkboxes = document.getElementsByName('foo');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = source.checked;
            }
        }
    </script>
@endsection
