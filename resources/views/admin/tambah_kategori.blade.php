@extends('layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid">
                <h2 class="title">Kategori</h2>
                <!--Button-->
                <div class="title-list col-sm-4 my-4">
                    <div class="list-detail">
                        <a class="btn btn-primary" href="{{ url('tambah_kategori') }}" role="button"><i
                                class="ti-plus me-2"></i>Tambah Kategori</a>
                    </div>
                </div>
                <!--Filter-->
                <div class="row">
                    <div class="kategori-list col-3 bg-white border p-3">
                        <h4 class="font-weight-bold"><b>Kategori</b></h4>
                        @foreach ($kategori as $kat)
                            <div class="tags d-flex my-3">
                                <a href="{{ url('kategori', $kat->id_kategori) }}"
                                    style="text-decoration: none">{{ $kat->nama_kategori }}</a>
                            </div>
                        @endforeach
                    </div>
                    <!--Filter End-->
                    <!--Main Content-->
                    <div class="kategori-container col-9 bg-white border ">
                        <div class="category-header" style="background-color: #f4f5f7;">
                            <div class="judul p-3 m-3">
                                <strong>Kategori Baru<strong>
                            </div>
                        </div>
                        <div class="category-content m-3">
                            <form action="{{ route('tambah_proses') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row me-3 ms-2" style="font-weight: normal;">
                                    <div class="category-name col-6">
                                        <div class="mx-0">
                                            <div class="form-label p-2 " style="background-color: #f4f5f7;">
                                                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                            </div>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                placeholder="Nama Kategori Baru" name="nama_kategori">
                                        </div>
                                    </div>
                                    <div class="category-name col-6" style="background-color: #f4f5f7;">
                                        <span>Ketersediaan</span>
                                        <div class="form-group mt-3">
                                            <div class="btn-kat dropdown">
                                                <select class="btn btn-success dropdown-toggle p-2 col-sm-8"
                                                    name="status_kategori" style="height: 40px;">
                                                    <option value=" Aktif">Aktif</option>
                                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-label p-3 m-3" style="background-color: #f4f5f7; font-weight: normal;">
                                        <label class="form-label ">Gambar Kategori</label>
                                    </div>
                                    <div class="img-content border m-3">
                                        <div class="row me-3 ms-2" style="font-weight: normal;">
                                            <div class="category-img col-5">
                                                <img src="{{ asset('assets/images/barang/kosong.jpg') }}" alt="">
                                            </div>
                                            <div class="category-img col-7 p-3">
                                                <div class="p-3"
                                                    style="background-color: #f4f5f7; height: 150px;">
                                                    <span>Unggah/ubah gambar kategori</span>
                                                    <div class="row">
                                                        <div
                                                            class="button d-sm-flex align-content-end align-items-end mb-3">
                                                            <input type="file" class="btn btn-icon-split ml-5 mb-3 mt-3"
                                                                name="foto" style="font-size: 12px;">
                                                            <input type="hidden" class="form-control-file" id="hidden-image"
                                                                name="hidden_image" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-label p-3 m-3" style="background-color: #f4f5f7; font-weight: normal;">
                                        <label class="form-label">Deskripsi</label>
                                    </div>
                                    <div class="form-group p-3">
                                        <textarea class="form-control" rows="7" style="height: 200px;"
                                            placeholder="masukan deskripsi kategori disini" name="deskripsi"></textarea>
                                    </div>
                                    <div class="btn-kat">
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
