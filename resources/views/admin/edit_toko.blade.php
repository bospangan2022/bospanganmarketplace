@extends('layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid">
                <h2 class="title">Informasi Toko</h2>
                </ <!--Filter End-->
                <!--Main Content-->
                @foreach ($toko as $t)
                    <div class=" card card-lg ps-3 mt-3">
                        <!--Daftar Produk-->
                        <form action="{{ url('update_toko_utama', $t->id_toko) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row m-5">
                                <div class="col-md-6 mt-5 pt-3">
                                    <div class="d-flex justify-content-center">
                                        <?php if ($t->foto_toko == NULL) { ?>
                                        <img src="{{ asset('assets/images/logo.png') }}" alt="" style="width: 300px;">
                                        <?php } else { ?>
                                        <img src="/images/post/{{ $t->foto_toko }}" style="width: 300px;">
                                        <?php } ?>
                                    </div>
                                    <div class=" p-3 mt-5" style="background-color: #f4f5f7; height: 150px;">
                                        <span>Unggah/Ubah gambar Toko</span>
                                        <div class="row">
                                            <div class="button d-sm-flex align-content-end align-items-end mb-3">
                                                <input type="file" class="btn btn-icon-split ml-5 mb-3 mt-3" name="foto"
                                                    style="font-size: 12px;">
                                                <input type="hidden" class="form-control-file" id="hidden-image"
                                                    name="hidden_image" value="">
                                            </div>
                                            @if ($errors->has('foto'))
                                                <span class="text-danger"> {{ $errors->first('foto') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-sm-12 mb-3 d-flex status-toko">
                                        <h3>Status Toko :</h3>
                                        <?php if ($t->status == "ts") { ?>
                                        <h3 class="text-danger">Belum Disetujui</h3>
                                        <?php } else { ?>
                                        <h3 class="text-success">Disetujui</h3>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-12 mb-3">
                                        <label class="form-label">Nama Pengguna</label>
                                        <input type="text" class="form-control" name="name" value="{{ $t->name }}"
                                            readonly>
                                    </div>
                                    <div class="col-sm-12 mb-3">
                                        <label class="form-label">Nama Toko</label>
                                        <input type="text" class="form-control" name="nama_toko"
                                            value="{{ $t->nama_toko }}" readonly>
                                    </div>
                                    <div class="col-sm-12 mb-3">
                                        <label class="form-label">Nomer Hp Toko</label>
                                        <input type="text" class="form-control" name="hp_toko"
                                            value="{{ $t->hp_toko }}">
                                    </div>
                                    <div class="col-sm-10 mb-3">
                                        <label class="form-label">Alamat Toko</label>
                                        <input type="text" class="form-control" name="alamat" value="{{ $t->alamat }}">
                                    </div>
                                    <div class="col-sm-10 mb-3">
                                        <div class="form-group col-md-12 col-lg-12 col-xl-12 d-flex flex-column">
                                            <label for="address_country">Kabupaten/Kota</label>
                                            <select name="kota" id="kota" class="js-example-basic-single"
                                                style="width: 100%;" data-show-subtext="true" data-live-search="true">
                                                @foreach ($kota as $ko)
                                                    <option value="{{ $ko->id_kota }}">{{ $ko->nama_kota }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('kota'))
                                                <span class="text-danger"> {{ $errors->first('kota') }}</span>
                                            @endif
                                        </div>
                                        <div class="row my-3">
                                            <div class="col-5 ">
                                                <p class="ms-4 mt-2 px-0 ">a.n Bank</p>
                                            </div>
                                            <div class="col-7">
                                                <input type="text" class="form-control" name="anrekening"
                                                    value=" {{ $t->anrekening }} ">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5 ">
                                                <p class=" ms-4 mt-2 px-0 ">Nomer Rekening</p>
                                            </div>
                                            <div class="col-7">
                                                <input type="text" class="form-control" name="rekening"
                                                    value="{{ $t->rekening }} ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 my-3">
                                    <label class="form-label">Alamat Toko</label>
                                    <input type="text" class="form-control" name="alamat" value="{{ $t->alamat }}">
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 d-flex flex-column">
                                        <label for="address_country">Kabupaten/Kota</label>
                                        <select name="kota" id="kota" class="js-example-basic-single" style="width: 100%;"
                                            data-show-subtext="true" data-live-search="true">
                                            <option value="">{{ $t->nama_kota }}</option>
                                            @foreach ($kota as $ko)
                                                <option value="{{ $ko->id_kota }}">{{ $ko->nama_kota }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('kota'))
                                            <span class="text-danger"> {{ $errors->first('kota') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 d-flex flex-column">
                                        <label>Kecamatan</label>
                                        <select select name="kecamatan" id="kecamatan" class="js-example-basic-single"
                                            style="width: 100%;" data-show-subtext="true" data-live-search="true">

                                        </select>
                                        @if ($errors->has('kecamatan'))
                                            <span class="text-danger"> {{ $errors->first('kecamatan') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 d-flex flex-column">
                                        <label>Kelurahan/Desa</label>
                                        <select select name="desa" id="desa" class="js-example-basic-single"
                                            style="width: 100%;" data-show-subtext="true" data-live-search="true">

                                        </select>
                                        @if ($errors->has('desa'))
                                            <span class="text-danger"> {{ $errors->first('desa') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 ">
                                        <label for="input-email">Kodepos<span class="required-f">*</span></label>
                                        <input name="kode_pos" value="{{ $t->kode_pos }}" id=" input-email" type="text">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Deskripsi Toko</label>
                                    <textarea type="text" class="form-control" name="deskripsi"
                                        style="height: 100px">{{ $t->deskripsi }}</textarea>
                                </div>
                            </div>
                            <div class="button d-flex justify-content-end m-5">
                                <button type="submit" class="btn btn-success ">Simpan Perubahan</button>
                            </div>

                        </form>
                    </div>

                @endforeach
                @foreach ($toko as $t)
                    <div class="card-mobile ps-3 mt-3">
                        <form action="{{ url('update_toko_utama', $t->id_toko) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <div class="d-flex justify-content-center">
                                    <?php if ($t->foto_toko == NULL) { ?>
                                    <img src="{{ asset('assets/images/logo.png') }}" alt="" style="width: 300px;">
                                    <?php } else { ?>
                                    <img src="/images/post/{{ $t->foto_toko }}" style="width: 300px;">
                                    <?php } ?>
                                </div>
                                <div class="p-3 d-flex justify-content-center"
                                    style="background-color: #f4f5f7; height: 150px;">
                                    <div class="row">
                                        <div class="button d-sm-flex align-content-end align-items-end mb-3">
                                            <input type="file" class="btn btn-icon-split ml-5 mb-3 mt-3" name="foto"
                                                style="font-size: 12px;">
                                            <input type="hidden" class="form-control-file" id="hidden-image"
                                                name="hidden_image" value="">
                                        </div>
                                        @if ($errors->has('foto'))
                                            <span class="text-danger"> {{ $errors->first('foto') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-sm-12 mb-3 d-flex status-toko">
                                    <h3>Status Toko :</h3>
                                    <?php if ($t->status == "ts") { ?>
                                    <h3 class="text-danger">Belum Disetujui</h3>
                                    <?php } else { ?>
                                    <h3 class="text-success">Disetujui</h3>
                                    <?php } ?>

                                </div>
                                <div class="col-sm-10 mb-3">
                                    <label class="form-label">Nama Pengguna</label>
                                    <input type="text" class="form-control" value="{{ $t->name }}" readonly>
                                </div>
                                <div class="col-sm-10 mb-3">
                                    <label class="form-label">Nama Toko</label>
                                    <input type="text" class="form-control" value="{{ $t->nama_toko }}" readonly>
                                </div>
                                <div class="col-sm-10 mb-3">
                                    <label class="form-label">Nomer Hp Toko</label>
                                    <input type="text" class="form-control" name="hp_toko" value="{{ $t->hp_toko }}">
                                </div>
<<<<<<< HEAD
                                <div class="col-sm-10 mb-3">
                                    <label class="form-label">Alamat Toko</label>
                                    <input type="text" class="form-control" name="alamat" value="{{ $t->alamat }}">
                                </div>
                                <div class="col-12">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 d-flex flex-column">
                                        <label for="address_country">Kabupaten/Kota</label>
                                        <select name="kota" id="kota_mobile" class="js-example-basic-single"
                                            style="width: 100%;" data-show-subtext="true" data-live-search="true">
                                            @foreach ($kota as $ko)
                                                <option value="{{ $ko->id_kota }}">{{ $ko->nama_kota }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('kota'))
                                            <span class="text-danger"> {{ $errors->first('kota') }}</span>
                                        @endif
=======
                                <div class="col-sm-12 mb-3">
                                    <label class="form-label">Informasi Rekening Toko</label>
                                    <div class="row my-3">
                                        <div class="col-5 ">
                                            <p class=" mt-2 px-0 ">Jenis Bank</p>
                                        </div>
                                        <div class="col-7">
                                            <input type="text" class="form-control" name="bank"
                                                value=" {{ $t->bank }}">
                                        </div>
>>>>>>> b7cb46c8f1f15826346d8076a2a80ddc41a54b6a
                                    </div>
                                    <div class="row my-3">
                                        <div class="col-5 ">
                                            <p class=" mt-2 px-0 ">a.n Bank</p>
                                        </div>
                                        <div class="col-7">
                                            <input type="text" class="form-control" name="anrekening"
                                                value=" {{ $t->anrekening }} ">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5 ">
                                            <p class="  mt-2 px-0 ">Nomer Rekening</p>
                                        </div>
                                        <div class="col-7">
                                            <input type="text" class="form-control" name="rekening"
                                                value="{{ $t->rekening }} ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-10 mb-3">
                                <label class="form-label">Alamat Toko</label>
                                <input type="text" class="form-control" name="alamat" value="{{ $t->alamat }}">
                            </div>
                            <div class="col-12">
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 d-flex flex-column">
                                    <label for="address_country">Kabupaten/Kota</label>
                                    <select name="kota" id="kota_mobile" class="js-example-basic-single"
                                        style="width: 100%;" data-show-subtext="true" data-live-search="true">
                                        <option value="">{{ $t->nama_kota }}</option>
                                        @foreach ($kota as $ko)
                                            <option value="{{ $ko->id_kota }}">{{ $ko->nama_kota }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('kota'))
                                        <span class="text-danger"> {{ $errors->first('kota') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 d-flex flex-column">
                                    <label>Kecamatan</label>
                                    <select select name="kecamatan" id="kecamatan_mobile" class="js-example-basic-single"
                                        style="width: 100%;" data-show-subtext="true" data-live-search="true">

                                    </select>
                                    @if ($errors->has('kecamatan'))
                                        <span class="text-danger"> {{ $errors->first('kecamatan') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 d-flex flex-column">
                                    <label>Kelurahan/Desa</label>
                                    <select select name="desa" id="desa_mobile" class="js-example-basic-single"
                                        style="width: 100%;" data-show-subtext="true" data-live-search="true">

                                    </select>
                                    @if ($errors->has('desa'))
                                        <span class="text-danger"> {{ $errors->first('desa') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 ">
                                    <label for="input-email">Kodepos</label>
                                    <input name="kode_pos" value="{{ $t->kode_pos }}" id="input-email" type="text">
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Deskripsi Toko</label>
                                <textarea type="text" class="form-control" name="deskripsi"
                                    style="height: 100px">{{ $t->deskripsi }}</textarea>
                            </div>
                            <div class="button d-flex justify-content-center m-5">
                                <button type="submit" class="btn btn-sm btn-success ">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
            </div>
            @endforeach
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
                    url: "/getKec_toko?id_kota=" + koID,
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
                    url: "/getDesa_toko?id_kecamatan=" + kecID,
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
    <script>
        $('#kota_mobile').change(function() {
            var koID = $(this).val();
            if (koID) {
                $.ajax({
                    type: "GET",
                    url: "/getKec_toko?id_kota=" + koID,
                    dataType: 'JSON',
                    success: function(res) {
                        if (res) {
                            $("#kecamatan_mobile").empty();
                            $("#kecamatan_mobile").append('<option>---Pilih Kecamatan---</option>');
                            $.each(res, function(nama, kode) {
                                $("#kecamatan_mobile").append('<option value="' + kode + '">' +
                                    nama +
                                    '</option>');
                            });
                        } else {
                            $("#kecamatan_mobile").empty();
                        }
                    }
                });
            } else {
                $("#kecamatan_mobile").empty();
            }
        });
        $('#kecamatan_mobile').change(function() {
            var kecID = $(this).val();
            if (kecID) {
                $.ajax({
                    type: "GET",
                    url: "/getDesa_toko?id_kecamatan=" + kecID,
                    dataType: 'JSON',
                    success: function(res) {
                        if (res) {
                            $("#desa_mobile").empty();
                            $("#desa_mobile").append('<option>---Pilih Kelurahan/Desa---</option>');
                            $.each(res, function(nama, kode) {
                                $("#desa_mobile").append('<option value="' + kode + '">' +
                                    nama +
                                    '</option>');
                            });
                        } else {
                            $("#desa_mobile").empty();
                        }
                    }
                });
            } else {
                $("#desa_mobile").empty();
            }
        });
    </script>
@endsection
