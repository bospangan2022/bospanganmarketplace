@extends('marketplace.layout.layout_register')

@section('content')

<div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Create an Account</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container">
            <div class="logo-login mb-3"><img src="{{ asset('assets/marketplace/images/login_lg.png') }}" alt=""></div>
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                	<div class="mb-4">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <b>Opps!</b> {{ $error }}
                                @endforeach
                            </div>
                        @endif
                       <form method="POST" action="{{ url('proses_registrasi') }}" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">	
                        @csrf       
                        <div class="row">
	                          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" placeholder="" id="nama" autofocus="">
                                    </div>
                               </div>
                               <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="no_hp">Username</label>
                                        <input type="text" name="username" placeholder="" id="username">
                                    </div>
                               </div>
                               <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="no_hp">No. Handphone</label>
                                        <input type="text" name="no_hp" placeholder="" id="no_hp">
                                    </div>
                               </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" placeholder="" id="email" class="" autocorrect="off" autocapitalize="off" autofocus="">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" value="" name="password" placeholder="" id="password" class="">
                                    <input type="hidden" name="role" value="pelanggan">                        	
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="password">Ulangi Password</label>
                                    <input type="password" value="" name="ulangi_password" placeholder="" id="password" class="">                    	
                                </div>
                            </div>
                          </div>
                         <div class="row">
                            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="submit" class="btn mb-5" value="Register">
                                <p class="mb-4">
									<a href="#" class="fb btn">
                                        <i class="fa fa-facebook fa-fw"></i> Register with Facebook
                                    </a>
                                   
                                    <a href="#" class="google btn">
                                        <i class="fa fa-google fa-fw"></i> Register with Google+
                                    </a>
								    
                                </p>
                            </div>
                         </div>
                     </form>
                    </div>
               	</div>
            </div>
        </div>
        
    </div>

@endsection