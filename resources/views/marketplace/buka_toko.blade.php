@extends('marketplace.layout.layout_profil')


@section('content')

    <div id="page-content">

        <div class="container">

            <div class="row billing-fields md-margin-30px-top  sm-margin-30px-top">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 sm-margin-10px-bottom">
                    <div class=" bg-light-gray padding-20px-all ">
                        <div class="mt-5 text-center">
                            <h2 class="login-title mb-2 ">Buka Tokomu Sekarang</h2>
                            <h3 class="buka-toko">Mari bergabung bersama kami, mewujudkan kesejahteraan pangan negeri
                            </h3>
                        </div>
                        <div class=" ">
                            <img src="{{ asset('assets/marketplace/images/toko.jpg') }}" alt="">
                            <a href="http://www.freepik.com">Designed by Freepik</a>
                        </div>
                    </div>
                </div>
                <div class="form-bukatoko col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="card border-success">
                        <div class="card-body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <b>Opps!</b> {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{ url('tambah_toko') }}" method="POST">
                                @csrf
                                <fieldset>
                                    <h3 class="detail-toko">Isikan Detail Tokomu Disini</h3>
                                    <div class="row">
                                        <div class="form-group col-md-9 col-lg-12 col-xl-12 required">
                                            <label for="input-firstname">Nama toko<span
                                                    class="required-f">*</span></label>
                                            <input name="nama_toko" value="" id="input-firstname" type="text">
                                            <p class="text-muted" style="font-size: 11px; margin:9px">Gunakan nama yang
                                                unik dan singkat</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6 ">
                                            <label for="input-telephone">Nomer Telephone Toko <span
                                                    class="required-f">*</span></label>
                                            <input name="phone" value="" id="input-telephone" type="tel"
                                                placeholder="contoh: 081234596xxx">
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6 ">
                                            <label for="input-telephone">Alamat<span class="required-f">*</span></label>
                                            <input name="alamat" value="" id="input-address" type="text">
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6 d-flex flex-column">
                                            <label for="address_country">Kabupaten/Kota</label>
                                            <select name="kota" id="kota" class="js-example-basic-single"
                                                style="width: 100%;" data-show-subtext="true" data-live-search="true">
                                                <option value="">== Pilih Kota/Kabupaten ==</option>
                                                @foreach ($kota as $ko)
                                                    <option value="{{ $ko->id_kota }}">{{ $ko->nama_kota }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6 d-flex flex-column">
                                            <label>Kecamatan</label>
                                            <select select name="kecamatan" id="kecamatan" class="js-example-basic-single"
                                                style="width: 100%;" data-show-subtext="true" data-live-search="true">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6 d-flex flex-column">
                                            <label>Kelurahan/Desa</label>
                                            <select select name="desa" id="desa" class="js-example-basic-single"
                                                style="width: 100%;" data-show-subtext="true" data-live-search="true">

                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                            <label for="input-email">Kodepos<span class="required-f">*</span></label>
                                            <input name="kode_pos" value="" id="input-email" type="text">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6 ">
                                            <label for="input-telephone">Bank <span class="required-f">*</span></label>
                                            <input name="bank" value="" id="input-telephone" type="tel"
                                                placeholder="contoh: BCA/BNI/BRI">
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6 ">
                                            <label for="input-telephone">Nomer Rekening <span
                                                    class="required-f">*</span></label>
                                            <input name="rekening" value="" id="input-telephone" type="tel">
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6 ">
                                            <label for="input-telephone">Atas Nama Rekening<span
                                                    class="required-f">*</span></label>
                                            <input name="anrekening" value="" id="input-address" type="text">
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn mb-3">Simpan</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

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
@endsection
