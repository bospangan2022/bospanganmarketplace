<?php
use Illuminate\Support\Facades\DB;
?>
@extends('marketplace.layout.layout_profil')


@section('content')

    <div id="page-content">
        <!--Page Title-->
        <div class="page section-header text-center">
            <div class="page-title">
                <div class="wrapper">
                    <h1 class="page-width">Profil</h1>
                </div>
            </div>
        </div>
        <!--End Page Title-->

        <div class="container">

            @foreach ($updAlamat as $p)
                <div class="ubah">
                    <form action="{{ url('update_alamat', $p->id_user_detail) }}" method="POST">
                        @csrf
                        <fieldset>
                            <h2 class="login-title mb-3">Edit Alamat</h2>
                            <div class="row">
                                <div class="form-group col-md-12 col-lg-12 col-xl-12 required">
                                    <label for="input-firstname">Nama Penerima<span class="required-f">*</span></label>
                                    <input name="nama_penerima" value="{{ $p->nama_penerima }}" id="input-firstname"
                                        type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="input-telephone">Telephone <span class="required-f">*</span></label>
                                    <input name="phone" value="{{ $p->phone }}" id="input-telephone" type="text">
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="input-email">Alamat <span class="required-f">*</span></label>
                                    <input name="alamat" value="{{ $p->alamat }}" id="input-email" type="text">
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 d-flex flex-column">
                                    <label for="address_country">Kabupaten/Kota</label>
                                    <select name="kota" id="kota" style="width: 100%;" data-show-subtext="true"
                                        data-live-search="true">
                                        <option value="">== Pilih Kota/Kabupaten ==</option>
                                        @foreach ($kota as $ko)
                                            <option value="{{ $ko->id_kota }}">{{ $ko->nama_kota }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 d-flex flex-column">
                                    <label>Kecamatan</label>
                                    <select id="kecamatan" name="kecamatan" data-show-subtext="true"
                                        data-live-search="true">

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 d-flex flex-column">
                                    <label>Kelurahan/Desa</label>
                                    <select id="desa" name="desa" data-default="" data-show-subtext="true"
                                        data-live-search="true">

                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="input-email">Kodepos<span class="required-f">*</span></label>
                                    <input name="kode_pos" value="{{ $p->kode_pos }}" id="input-email" type="text">
                                </div>
                            </div>
                            <fieldset>
                                <div class="row">
                                    <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                        <label for="input-company">Catatan Untuk Kurir (optional)</label>
                                        <textarea class="form-control resize-both" name="catatan"
                                            rows="3">{{ $p->catatan }}</textarea>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="text-center">
                                <button type="submit" class="btn mb-3">Simpan</button>
                            </div>
                    </form>
                </div>
            @endforeach
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
                        url: "/getKec?id_kota=" + koID,
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
                console.log(koID);
            });

            $('#kecamatan').change(function() {
                var kecID = $(this).val();
                if (kecID) {
                    $.ajax({
                        type: "GET",
                        url: "/getDesa?id_kecamatan=" + kecID,
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
                console.log(kecId);
            });

            function konfirmasi() {
                confirm("Press a button!");
            }
        </script>
    @endsection
