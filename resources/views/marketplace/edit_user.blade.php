@extends('marketplace.layout.layout_edituser')

@section('content')

    <div id="page-content">
        <!--Page Title-->
        <div class="page section-header text-center">
            <div class="page-title">
                <div class="wrapper">
                    <h1 class="page-width">Edit User</h1>
                </div>
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
                        <form method="POST" action="{{ url('upd_user') }}" id="CustomerLoginForm" accept-charset="UTF-8"
                            class="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="no_hp">Username</label>
                                        <input type="text" name="username" placeholder="" id="username"
                                            value={{ Auth::user()->username }}>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="password">Password Lama</label>
                                        <input type="password" value="" name="password" placeholder="" id="password"
                                            class="">
                                        <input type="hidden" name="role" value="pelanggan">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="password">Password Baru</label>
                                        <input type="password" value="" name="pass" placeholder="" id="password"
                                            class="">
                                        <input type="hidden" name="role" value="pelanggan">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="password">Ulangi Password Baru</label>
                                        <input type="password" value="" name="ulangi_password" placeholder="" id="password"
                                            class="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                                    <input type="submit" class="btn mb-5" value="Ubah Data User">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
