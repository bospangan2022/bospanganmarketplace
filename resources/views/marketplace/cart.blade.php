@extends('marketplace.layout.layout_cart')

@section('content')

<!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Shopping Cart</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                	<div class="alert alert-success text-uppercase" role="alert">
						<i class="icon anm anm-truck-l icon-large"></i> &nbsp;<strong>Selamat!</strong> Anda mendapatkan gratis ongkir!
					</div>
                		<table class="cart style2">
                            <thead class="cart__row cart__header">
                                <tr>
                                <th class="text-left">
                                    <div class="form-check">
                                    <input class="form-check-input text-" type="checkbox" value="" id="flexCheckChecked" onClick="toggle(this)" >
                                    <label class="form-check-label ml-3" for="flexCheckChecked">
                                        All
                                    </label>
                                    </div>
                                </th>
                                    <th colspan="2" class="text-center">Produk</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-right">Total</th>
                                    <th class="action">&nbsp;</th>
                                </tr>
                            </thead>
                    		<tbody>
                                @foreach($keranjang as $krj)  

                                <tr class="cart__row border-bottom line1 cart-flex border-top">
                                <td class="cart__meta pl-3 text-center">
                                <input class="form-check-input" type="checkbox" value="{{$krj->id_barang}}" id="flexCheckDefault" name="foo">
                                    </td>
                                    <td class="cart__image-wrapper cart-flex-item">
                                        <a href="{{ url('produkdetail', $krj->id_barang) }}"><img class="cart__image" src="/images/post/{{$krj->foto}}" alt="Elastic Waist Dress - Navy / Small"></a>
                                    </td>
                                    <td class="cart__meta small--text-left cart-flex-item">
                                        <div class="list-view-item__title">
                                            <a href="{{ url('produkdetail', $krj->id_barang) }}">{{$krj->nama_barang}} </a>
                                        </div>
                                        
                                        <div class="cart__meta-text">
                                            {{$krj->keterangan}}
                                        </div>
                                    </td>
                                    <td class="cart__price-wrapper cart-flex-item">
                                        <span class="money">@currency($krj->harga)</span>
                                    </td>
                                    <form action="{{url('update_cart',$krj->id_keranjang)}}" method="POST">
                                        @csrf
                                    <td class="cart__update-wrapper cart-flex-item text-right">
                                        <div class="cart__qty text-center">
                                            <div class="qtyField">
                                                <a class="qtyBtn minus" href="javascript:void(0);"><i class="icon icon-minus"></i></a>
                                                <input class="cart__qty-input qty" type="text" name="jumlah" id="qty" value="{{$krj->jumlah}}" pattern="[0-9]*">
                                                <a class="qtyBtn plus" href="javascript:void(0);"><i class="icon icon-plus"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right small--hide cart-price">
                                        <input type="hidden" name="sub_harga" value="{{ $krj->sub_harga}}">
                                        <input type="hidden" name="harga" value="{{ $krj->harga}}">
                                        <div><span class="money">@currency($krj->sub_harga)</span></div>
                                    </td>
                                    <td class="text-center small--hide"><a href="{{url('remove_cart',$krj->id_keranjang)}}" class="btn btn--secondary cart__remove" title="Remove tem"><i class="icon icon anm anm-times-l"></i></a>
                                    
                                    <button type="submit" class="btn btn--secondary cart__remove"><i class="anm anm-edit"></i></button></td>
                                    </form>
                                </tr>
                                @endforeach
                            </tbody>
                    		<tfoot>
                                <tr>
                                    <td colspan="3" class="text-left"><a href="{{url('belanja')}}" class="btn btn-secondary btn--small cart-continue">Lanjutkan Belanja</a></td>
                                    <td colspan="3" class="text-right">
	                                    <a href="{{url('remove_cartall')}}" type="submit" name="clear" class="btn btn-secondary btn--small  small--hide">Clear Cart</a>
                                    </td>
                                </tr>
                            </tfoot>
                            
                    </table>                  
               	</div>
                
                
                <div class="container mt-4">
                    <div class="row">
                    	<div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-4">
                        	<h5>Kode Voucher</h5>
                            <form action="#" method="post">
                            	<div class="form-group">
                                    <label for="address_zip">Masukkan kode voucher yang anda miliki</label>
                                    <input type="textarea" name="coupon">
                                </div>
                                
                            </form>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-4">
                        	<h5>Estimasi Pengiriman</h5>
							<form action="#" method="post">
                                <div class="row-fluid">
                                    <label for="address_country">Kabupaten/Kota</label>
                                    <select  name="kota" id="kota" class="js-example-basic-single" style="width: 100%;" data-show-subtext="true" data-live-search="true" >
                                    <option value="">== Pilih Kota/Kabupaten ==</option>
                                        @foreach($kota as $ko)
                                        <option value="{{$ko->id}}">{{$ko->nama_kota}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <select select name="kecamatan" id="kecamatan" class="js-example-basic-single" style="width: 100%;" data-show-subtext="true" data-live-search="true" >
                                       
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Kelurahan/Desa</label>
                                    <select select name="desa" id="desa" class="js-example-basic-single" style="width: 100%;" data-show-subtext="true" data-live-search="true"  >
                                       
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="address_zip">Postal/Zip Code</label>
                                    <input type="text" id="address_zip" name="address[zip]">
                                </div>
    
                                <div class="actionRow">
                                    <div><input type="button" class="btn btn-secondary btn--small" value="Hitung Estimasi "></div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer">
                            <div class="solid-border">	
                              <div class="row border-bottom pb-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title">Subtotal</span>
                                <span class="col-12 col-sm-6 text-right"><span class="money">@currency($sub_total)</span></span>
                              </div>
                              <!-- <div class="row border-bottom pb-2 pt-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title">PPN %</span>
                                <span class="col-12 col-sm-6 text-right">@currency($ppn)</span>
                              </div> -->
                              <div class="row border-bottom pb-2 pt-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title">Shipping</span>
                                <span class="col-12 col-sm-6 text-right">@currency($ongkir)</span>
                              </div>
                              <div class="row border-bottom pb-2 pt-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Grand Total</strong></span>
                                <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span class="money">@currency($grand_total)</span></span>
                              </div>
                              <div class="cart__shipping">Shipping &amp; taxes calculated at checkout</div>
                              @foreach($keranjang as $krj)
                              <a href="{{ url('checkout') }}">
                             @endforeach
                                  <input type="submit" name="checkout" id="cartCheckout" class="btn btn--small-wide checkout" value="Checkout">
                              </a>
                             
                            </div>
        
                        </div>
                    </div>
                </div>
                
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
                            $("#kecamatan").append('<option value="' + kode + '">' + nama + '</option>');
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
                            $("#desa").append('<option value="' + kode + '">' + nama + '</option>');
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
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
    </script>
  @endsection


