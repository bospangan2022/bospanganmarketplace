@extends('admin_toko.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid">
                <h2 class="title bold">Kategori</h2>
                <!--Button-->
                <div class="col-sm-4  d-flex justify-content-between align-items-stretch my-4">
                    <a class="btn btn-primary" href="{{ url('tambah_kategori_user') }}" role="button"><i
                            class="ti-plus me-2"></i>Tambah Kategori</a>
                </div>
                <!--Filter-->
                <div class="row">
                    <div class="col-3 bg-white border p-3">
                        <div class="kategori">
                            <h4 class="font-weight-bold"><b>Kategori</b></h4>
                            @foreach ($menu as $kat)
                                <div class="tags d-flex my-3">
                                    <a href="{{ url('kategori_user', $kat->id_kategori) }}"
                                        style="text-decoration: none">{{ $kat->nama_kategori }}</a>
                                </div>
                            @endforeach
                        </div>
                        <div class="kategori-saya">
                            <h4 class="font-weight-bold"><b>Kategori Ditambahkan</b></h4>
                            @foreach ($menunew as $kat)
                                <div class="tags d-flex my-3">
                                    <a href="{{ url('kategori_usernew', $kat->id_kategori) }}"
                                        style="text-decoration: none">{{ $kat->nama_kategori }}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!--Filter End-->
                    <!--Main Content-->
                    <div class="col-9 bg-white border ">
                        <div class="category-header" style="background-color: #f4f5f7;">
                            <div class="title d-flex p-3 m-3">
                                <strong class="fs-3 mb-5">Kategori Baru<strong>
                            </div>
                        </div>
                        <div class="category-content m-3">
                            <form action="{{ route('tambah_proses_user') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row me-3 ms-2" style="font-weight: normal;">
                                    <div class="col-6">
                                        <div class="mx-0">
                                            <div class="form-label p-2 " style="background-color: #f4f5f7;">
                                                <label for="exampleFormControlInput1" class="form-label fs-5">Nama</label>
                                            </div>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                placeholder="Nama Kategori Baru" name="nama_kategori">
                                        </div>
                                    </div>
                                    <div class="col-6 p-3" style="background-color: #f4f5f7;">
                                        <span class="fs-5">Ketersediaan</span>
                                        <div class="form-group row">
                                            <div class="dropdown">
                                                <select class="btn btn-success dropdown-toggle col-sm-8"
                                                    name="status_kategori">
                                                    <option value="Aktif">Aktif</option>
                                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-label p-3 m-3" style="background-color: #f4f5f7; font-weight: normal;">
                                        <label class="form-label fs-5">Gambar Kategori</label>
                                    </div>
                                    <div class="img-content border m-3">
                                        <div class="row me-3 ms-2" style="font-weight: normal;">
                                            <div class="col-5">
                                                <img src="{{ asset('assets/images/barang/kosong.jpg') }}" alt="">
                                            </div>
                                            <div class="col-7 p-3">
                                                <div class="p-3"
                                                    style="background-color: #f4f5f7; height: 150px;">
                                                    <span class="fs-5">Unggah/ubah gambar kategori</span>
                                                    <div class="row">
                                                        <div
                                                            class="button d-sm-flex align-content-end align-items-end mb-3">
                                                            <input type="file" class="btn btn-icon-split ml-5 mb-3 mt-3"
                                                                name="foto">
                                                            <input type="hidden" class="form-control-file" id="hidden-image"
                                                                name="hidden_image" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-label p-3 m-3" style="background-color: #f4f5f7; font-weight: normal;">
                                        <label class="form-label fs-5">Deskripsi</label>
                                    </div>
                                    <div class="form-group p-3">
                                        <textarea class="form-control" rows="7" style="height: 200px;"
                                            placeholder="masukan deskripsi kategori disini" name="deskripsi"></textarea>
                                    </div>
                                    <div class="d-flex justiy-content-end">
                                        <button class="btn btn-primary ms-3 berhasil" type="submit"
                                            onclick="tambah_kategori()">Simpan</button>
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
