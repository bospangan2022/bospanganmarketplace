@extends('marketplace.layout.layout_checkout')

@section('content')

<div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Checkout</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container">
        	<div class="row">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                    <div class="customer-box customer-coupon">
                        <h3 class="font-15 xs-font-13"><i class="icon anm anm-gift-l"></i> Have a coupon? <a href="#have-coupon" class="text-white text-decoration-underline" data-toggle="collapse">Click here to enter your code</a></h3>
                        <div id="have-coupon" class="collapse coupon-checkout-content">
                            <div class="discount-coupon">
                                <div id="coupon" class="coupon-dec tab-pane active">
                                    <p class="margin-10px-bottom">Enter your coupon code if you have one.</p>
                                    <label class="required get" for="coupon-code"><span class="required-f">*</span> Coupon</label>
                                    <input id="coupon-code" required="" type="text" class="mb-3">
                                    <button class="coupon-btn btn" type="submit">Apply Coupon</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row billing-fields">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 sm-margin-30px-bottom">
                <div class="create-ac-content bg-light-gray padding-20px-all mb-3"> <h2 class="login-title mb-3">Alamat Pengiriman</h2>
                    <div class="row">
                        @foreach($user as $us)
                        <div class="form-group col-md-12 col-lg-12 col-xl-12 border-bottom">
                        <table class="table-borderless ms-5 mb-5">
                                    <tbody>
                                       
                                        <tr>
                                            <td class="col-1">
                                                <span >Nama Penerima</span>
                                            </td>
                                            <td class="col-1">
                                                <span >:</span>
                                            </td>
                                            <td>
                                                <span >{{$us->nama_penerima}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-3">
                                                <span>No Hp</span>
                                            </td>
                                            <td class="col-1">
                                                <span >:</span>
                                            </td>
                                            <td>
                                                <span>{{$us->phone}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-3">
                                                <span>Alamat</span>
                                            </td>
                                            <td class="col-1">
                                                <span >:</span>
                                            </td>
                                            <td>
                                                <span>{{$us->alamat}} </span>
                                                <span>{{$us->nama_kota}}</span>
                                                <span>{{$us->nama_kecamatan}}</span>
                                                <span>{{$us->nama_desa}}</span>
                                                <span>{{$us->kode_pos}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-3">
                                                <span>Catatan</span>
                                            </td>
                                            <td class="col-1">
                                                <span >:</span>
                                            </td>
                                            <td>
                                                <span>{{$us->catatan}}</span>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end mb-2 ">
                                    <a class="btn btn-sm btn-seccondary m   e-5" href="{{url('profil')}}">Ubah Alamat</a>
                                   
                                </div>  
                        </div>
                        @endforeach  
                    </div>
                </div>
                
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="your-order-payment">
                        <div class="your-order">
                            <h2 class="order-title mb-4">Pesanan Anda</h2>

                            <div class="table-responsive-sm order-table"> 
                                <table class="bg-white table table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-left">Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($checkout as $co)
                                        <tr>
                                            <td class="text-left">{{$co->nama_barang}}</td>
                                            <td>Rp {{$co->harga}},00</td>
                                            <td>{{$co->jumlah}}</td>
                                            <td>Rp {{$co->sub_harga}},00</td>
                                        </tr>
                                    @endforeach    
                                    </tbody>
                                    <tfoot class="font-weight-600">
                                        <tr>
                                            <td colspan="3" class="text-right">Shipping </td>
                                            <td>FREE</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right">Total</td>
                                            <td>Rp {{$grand_total}},00</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        
                        <hr />

                        <div class="your-payment">
                            <h2 class="payment-title mb-3">Metode Pembayaran</h2>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div id="accordion" class="payment-section">
                                        <div class="card mb-2">
                                            <div class="card-header">
                                                <a class="card-link me-5" data-toggle="collapse" href="#collapseOne">Transfer Bank (Dicek Manual) </a>
                                            </div>
                                            <div id="collapseOne" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <p class="no-margin font-15">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-2">
                                            <div class="card-header">
                                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">Transfer Bank (Virtual Account)</a>
                                            </div>
                                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <p class="no-margin font-15">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card margin-15px-bottom border-radius-none">
                                            <div class="card-header">
                                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree"> COD </a>
                                            </div>
                                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <p class="no-margin font-15">Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-2">
                                            <div class="card-header">
                                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour"> Payment Information </a>
                                            </div>
                                            <div id="collapseFour" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <fieldset>
                                                        <div class="row">
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <label for="input-cardname">Name on Card <span class="required-f">*</span></label>
                                                                <input name="cardname" value="" placeholder="Card Name" id="input-cardname" class="form-control" type="text">
                                                            </div>
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <label for="input-country">Credit Card Type <span class="required-f">*</span></label>
                                                                <select name="country_id" class="form-control">
                                                                    <option value=""> --- Please Select --- </option>
                                                                    <option value="1">American Express</option>
                                                                    <option value="2">Visa Card</option>
                                                                    <option value="3">Master Card</option>
                                                                    <option value="4">Discover Card</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <label for="input-cardno">Credit Card Number  <span class="required-f">*</span></label>
                                                                <input name="cardno" value="" placeholder="Credit Card Number" id="input-cardno" class="form-control" type="text">
                                                            </div>
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <label for="input-cvv">CVV Code <span class="required-f">*</span></label>
                                                                <input name="cvv" value="" placeholder="Card Verification Number" id="input-cvv" class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <label>Expiration Date <span class="required-f">*</span></label>
                                                                <input type="date" name="exdate" class="form-control">
                                                            </div>
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <img class="padding-25px-top xs-padding-5px-top" src="{{ asset('assets/marketplace/images/payment-img.jpg') }}" alt="card" title="card" />
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="order-button-payment">
                                    <button class="btn" value="Place order" type="submit">Place order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection