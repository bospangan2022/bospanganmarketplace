@extends('admin_toko.layout.layout')
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
                        <form action="{{ url('update_toko', $t->id_toko) }}" method="POST">
                            <div class="row m-5">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-center">
                                        <?php if ($t->foto_toko == NULL) { ?>
                                        <img src="{{ asset('assets/images/barang/kosong.jpg') }}" alt="">
                                        <?php } else { ?>
                                        <img src="/images/post/{{ $t->foto_toko }}" <?php } ?> </div>
                                        <div class="p-3" style="background-color: #f4f5f7; height: 150px;">
                                            <span>Unggah/Ubah gambar Toko</span>
                                            <div class="row">
                                                <div class="button d-sm-flex align-content-end align-items-end mb-3">
                                                    <input type="file" class="btn btn-icon-split ml-5 mb-3 mt-3" name="foto"
                                                        style="font-size: 12px;">
                                                    <input type="hidden" class="form-control-file" id="hidden-image"
                                                        name="hidden_image" value="">
                                                </div>
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
                                            <input type="text" class="form-control" value="{{ $t->nama_toko }}"
                                                readonly>
                                        </div>
                                        <div class="col-sm-10 mb-3">
                                            <label class="form-label">Nomer Hp Toko</label>
                                            <input type="text" class="form-control" value="{{ $t->no_hp }}">
                                        </div>
                                        <div class="col-sm-10 mb-3">
                                            <label class="form-label">Alamat Toko</label>
                                            <input type="text" class="form-control" value="{{ $t->alamat }}">
                                        </div>
                                        <div class="col-sm-10 mb-3">
                                            <div class="form-group col-md-12 col-lg-12 col-xl-12 d-flex flex-column">
                                                <label for="address_country">Kabupaten/Kota</label>
                                                <select name="kota" id="kota" class="js-example-basic-single"
                                                    style="width: 100%;" data-show-subtext="true" data-live-search="true">
                                                    <option value="">{{ $t->nama_kota }}</option>
                                                    @foreach ($kota as $ko)
                                                        <option value="{{ $ko->id_kota }}">{{ $ko->nama_kota }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12 col-lg-12 col-xl-12 d-flex flex-column">
                                                <label>Kecamatan</label>
                                                <select select name="kecamatan" id="kecamatan"
                                                    class="js-example-basic-single" style="width: 100%;"
                                                    data-show-subtext="true" data-live-search="true">

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
                                            <div class="form-group col-md-12 col-lg-12 col-xl-12 ">
                                                <label for="input-email">Kodepos<span
                                                        class="required-f">*</span></label>
                                                <input name="kode_pos" value="{{ $t->kode_pos }}" id=" input-email"
                                                    type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputAddress" class="form-label">Deskripsi Toko</label>
                                        <textarea type="text" class="form-control"
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
                        <form action="{{ url('update_toko', $t->id_toko) }}" method="POST">
                            <div class="col-md-6">
                                <div class="d-flex justify-content-center">
                                    <?php if ($t->foto_toko == NULL) { ?>
                                    <img src="{{ asset('assets/images/barang/kosong.jpg') }}" alt="">
                                    <?php } else { ?>
                                    <img src="/images/post/{{ $t->foto_toko }}" <?php } ?> </div>
                                    <div class="p-3 d-flex justify-content-center"
                                        style="background-color: #f4f5f7; height: 150px;">
                                        <div class="row">
                                            <div class="button d-sm-flex align-content-end align-items-end mb-3">
                                                <input type="file" class="btn btn-icon-split ml-5 mb-3 mt-3" name="foto"
                                                    style="font-size: 12px;">
                                                <input type="hidden" class="form-control-file" id="hidden-image"
                                                    name="hidden_image" value="">
                                            </div>
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
                                        <input type="text" class="form-control" value="{{ $t->no_hp }}">
                                    </div>
                                    <div class="col-sm-10 mb-3">
                                        <label class="form-label">Alamat Toko</label>
                                        <input type="text" class="form-control" value="{{ $t->alamat }}">
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6 d-flex flex-column">
                                            <label for="address_country">Kabupaten/Kota</label>
                                            <select name="kota" id="kota" class="js-example-basic-single"
                                                style="width: 100%;" data-show-subtext="true" data-live-search="true">
                                                <option value="">{{ $t->nama_kota }}</option>
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
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Deskripsi Toko</label>
                                    <textarea type="text" class="form-control"
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
