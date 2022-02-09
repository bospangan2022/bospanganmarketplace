@extends('layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid">
                <h2 class="title">Kategori</h2>
                <!--Button-->
                <div class=" title-list col-sm-4 my-4">
                    <div class="list-detail">
                        <a class="btn btn-primary" href="{{ url('tambah_kategori') }}" role="button"><i
                                class="ti-plus me-2"></i>Tambah Kategori</a>
                    </div>
                    <div class="list-detail">
                        @foreach ($kategori as $kat)
                            <a class="btn btn-primary" href="{{ url('hapus_kategori', $kat->id_kategori) }}"
                                role="button">Hapus
                                Kategori</a>
                        @endforeach
                    </div>
                </div>

                <!--Filter-->
                <div class="row">
                    <div class="kategori-list col-3 bg-white border p-3">
                        <h4 class="font-weight-bold"><b>Kategori</b></h4>
                        @foreach ($menu as $kat)
                            <div class="tags d-flex my-3">
                                <a href="{{ url('kategori', $kat->id_kategori) }}"
                                    style="text-decoration: none">{{ $kat->nama_kategori }}</a>
                            </div>
                        @endforeach
                    </div>
                    <!--Filter End-->
                    <!--Main Content-->
                    <div class="kategori-container col-9 bg-white border ">
                        @foreach ($kategori as $kat)
                            <div class="category-header p-3 m-3" style="background-color: #f4f5f7;">
                                <div class="judul ">
                                    <strong>{{ $kat->nama_kategori }}<strong>
                                </div>
                                <div class="category-nav m-3">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page"
                                                href="{{ url('kategori', $kat->id_kategori) }}">Umum</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="{{ url('kategori_produk', $kat->id_kategori) }}">Kategori Produk</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="category-content m-3">
                                <form action="{{ route('edit_kategori', $kat->id_kategori) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row me-3 ms-2" style="font-weight: normal;">
                                        <div class="category-name col-6">
                                            <div class="mx-0">
                                                <div class="form-label p-2 " style="background-color: #f4f5f7;">
                                                    <label for="exampleFormControlInput1" class="form-label fs-5">Nama
                                                        Kategori</label>
                                                </div>
                                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="Nama Kategori" value="{{ $kat->nama_kategori }}"
                                                    name="nama_kategori">
                                            </div>
                                        </div>
                                        <div class="category-name col-6 " style="background-color: #f4f5f7;">
                                            <span>Ketersediaan</span>
                                            <div class="form-group mt-3">
                                                <div class="btn-kat dropdown">
                                                    <select class="btn btn-success dropdown-toggle col-sm-8 p-2 "
                                                        name="status_kategori" style="height: 40px;">
                                                        <option selected hidden>{{ $kat->status_kategori }}</option>
                                                        <option value="Aktif">Aktif</option>
                                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-label p-3 m-3" style="background-color: #f4f5f7; font-weight: normal;">
                                        <label class="form-label fs-5">Gambar Kategori</label>
                                    </div>
                                    <div class="img-content border m-3">
                                        <div class="row me-3 ms-2" style="font-weight: normal;">
                                            <div class="col-5 d-flex align-items-center">
                                                <img src="/images/post/{{ $kat->foto }}"
                                                    style="width: 100%; height: 80%;" alt="">
                                            </div>
                                            <div class="category-img col-7 p-3">
                                                <div class="p-3"
                                                    style="background-color: #f4f5f7; height: 150px;">
                                                    <span>Unggah/ubah gambar kategori</span>
                                                    <div class="row">
                                                        <div
                                                            class="button d-sm-flex align-content-end align-items-end mb-3">
                                                            <input type="file" class="btn btn-icon-split ml-5 mb-3 mt-3"
                                                                name="foto">
                                                            <input type="hidden" class="form-control-file" id="hidden-image"
                                                                name="hidden_image" value="{{ $kat->foto }}">
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
                                            placeholder="masukan deskripsi kategori disini" value=""
                                            name="deskripsi">{{ $kat->deskripsi }}</textarea>
                                    </div>
                            </div>
                            <div class="btn-kat mb-4">
                                <button class="btn btn-primary ms-3 berhasil" type="submit">Simpan Perubahan</button>
                            </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
