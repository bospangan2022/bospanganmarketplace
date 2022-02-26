@extends('layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid">
                <h2 class="title">Informasi Toko</h2>
                </ <!--Filter End-->
                <!--Main Content-->
                @foreach ($toko as $t)
                    <div class=" card card-lg ps-3 pt-3 mt-3">
                        <!--Daftar Produk-->
                        <div class="row m-5">
                            <div class="col-md-6 d-flex justify-content-center align-items-center">
                                <?php if ($t->foto_toko == NULL) { ?>
                                <img src="{{ asset('assets/images/logo.png') }}" alt="" style="width: 300px;">
                                <?php } else { ?>
                                <img src="/images/post/{{ $t->foto_toko }}" style="width: 300px;"> <?php } ?>
                            </div>
                            <div class="col-md-6 ps-5">
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
                                    <input type="text" class="form-control" name="name" value="{{ $t->name }}"
                                        readonly>
                                </div>
                                <div class="col-sm-10 mb-3">
                                    <label class="form-label">Nama Toko</label>
                                    <input type="text" class="form-control" name="nama_toko" value="{{ $t->nama_toko }}"
                                        readonly>
                                </div>
                                <div class="col-sm-10 mb-3">
                                    <label class="form-label">Nomer Hp Toko</label>
                                    <input type="text" class="form-control" name="hp_toko" value="{{ $t->hp_toko }}"
                                        readonly>
                                </div>
                                <div class="col-sm-10 mb-3">
                                    <label class="form-label">Alamat Toko</label>
                                    <textarea type="text" class="form-control" name="alamat" style="height: 100px"
                                        value=""
                                        readonly>{{ $t->alamat }}, {{ $t->nama_desa }}, {{ $t->nama_kecamatan }}, {{ $t->nama_kota }}  {{ $t->kode_pos }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Deskripsi Toko</label>
                                <textarea type="text" class="form-control" name="deskripsi" style="height: 100px"
                                    readonly>{{ $t->deskripsi }}</textarea>
                            </div>
                        </div>
                        <div class="button d-flex justify-content-end m-5">
                            <a href="{{ url('edit_toko_utama', $t->id_toko) }}" class="btn btn-success ">Edit</a>
                        </div>
                    </div>

                @endforeach
                @foreach ($toko as $t)
                    <div class="card-mobile ps-3 mt-3">
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center">
                                <?php if ($t->foto_toko == NULL) { ?>
                                <img src="{{ asset('assets/images/logo.png') }}" alt="" style="width: 300px;">
                                <?php } else { ?>
                                <img src="/images/post/{{ $t->foto_toko }}" style="width: 300px;"> <?php } ?>
                            </div>
                            <div class="p-3 d-flex justify-content-center"
                                style="background-color: #f4f5f7; height: 150px;">
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
                                <input type="text" class="form-control" value="{{ $t->no_hp }}" readonly>
                            </div>
                            <div class="col-sm-10 mb-3">
                                <label class="form-label">Alamat Toko</label>
                                <textarea type="text" class="form-control" name="alamat" style="height: 100px" value=""
                                    readonly>{{ $t->alamat }}, {{ $t->nama_desa }}, {{ $t->nama_kecamatan }}, {{ $t->nama_kota }}  {{ $t->kode_pos }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Deskripsi Toko</label>
                            <textarea type="text" class="form-control" style="height: 100px"
                                readonly>{{ $t->deskripsi }}</textarea>
                        </div>
                        <div class="button d-flex justify-content-center m-5">
                            <a href="{{ url('edit_toko_utama', $t->id_toko) }}" class="btn btn-success ">Edit</a>
                        </div>
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
