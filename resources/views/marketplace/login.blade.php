@extends('marketplace.layout.layout_login')

@section('content')

<div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Login</h1></div>
      		</div>
		  </div>
        <!--End Page Title-->
        
        <div class="container">
          <div class="logo-login mb-3"><img src="{{ asset('assets/marketplace/images/login_lg.png') }}" alt=""></div>
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                	<div class="mb-4">
                       <form method="POST" action="{{ url('proses_login') }}" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">	
                        {{ csrf_field() }}  
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerEmail">Username</label>
                                    <input type="text" name="username" placeholder="" id="CustomerUsername" class="" autocorrect="off" autocapitalize="off" autofocus="" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerPassword">Password</label>
                                    <input type="password" value="" name="password" placeholder="" id="CustomerPassword" class="" req>                        	
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="submit" name="login" id="login" class="btn mb-3" value="Login">
                                <p>Or</p>
                                <div class="col mb-4">
                                    <a href="#" class="fb btn">
                                    <i class="fa fa-facebook fa-fw"></i> Login with Facebook
                                    </a>
                                    
                                    <a href="#" class="google btn">
                                    <i class="fa fa-google fa-fw"></i> Login with Google+
                                    </a>
                                </div>
                                <p class="mb-4">
									<a href="#" id="RecoverPassword">Lupa Password ?</a> &nbsp; | &nbsp;
								    <a href="{{ url('register') }}" id="customer_register_link">Register</a>
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