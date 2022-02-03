@extends('layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
       <div class="container-fluid">
          <h2 class="title bold">Kategori</h2>
          <!--Button-->
          <div class="col-sm-6 d-flex justify-content-around align-items-stretch my-4" >
            <a class="btn btn-primary" href="{{url('tambah_kategori')}}" role="button"><i class="ti-plus me-2"></i>Tambah Kategori</a>
              <button class="btn btn-primary hapus" type="submit">Hapus Kategori</button>
          </div>
          <!--Filter-->
          <div class="row">
              <div class="col-3 bg-white border p-3">
               <h4 class="font-weight-bold"><b>Kategori</b></h4>
                <div class="tags d-flex my-3">
                  <a href="#" style="text-decoration: none">Laman Tampilan Produk</a>
                  <a>(3)</a>
                </div>
                <div class="tags d-flex my-3">
                  <a href="#" style="text-decoration: none">Laman Tampilan Produk</a>
                  <a>(3)</a>
                </div>
                <div class="tags d-flex my-3">
                  <a href="#" style="text-decoration: none">Obat</a>
                  <a>(3)</a>
                </div>
                <div class="tags d-flex my-3">
                  <a href="#" style="text-decoration: none">Sembako</a>
                  <a>(3)</a>
                </div>
                <div class="tags d-flex my-3">
                  <a href="#" style="text-decoration: none">Lauk Pauk</a>
                  <a>(3)</a>
                </div>
                <div class="tags d-flex my-3">
                  <a href="#" style="text-decoration: none">Snack</a>
                  <a>(3)</a>
                </div>
                <div class="tags d-flex my-3">
                  <a href="#" style="text-decoration: none">Minuman</a>
                  <a>(3)</a>
                </div>
                <div class="tags d-flex my-3">
                  <a href="#" style="text-decoration: none">Sayuran</a>
                  <a>(3)</a>
                </div>
              </div>
              <!--Filter End-->
              <!--Main Content-->
              <div class="col-9 bg-white border ">
                <div class="category-header" style="background-color: #f4f5f7;">
                  <div class="title d-flex p-3 m-3">
                    <strong class="fs-3">'Aneka deterjen, shampo, dan sabun' kategori<strong>
                  </div>
                  <div class="category-nav m-3">
                    <ul class="nav nav-pills">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('kategori')}}">Umum</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{url('kategori_produk')}}">Kategori Produk</a>
                      </li> 
                    </ul> 
                  </div>
                </div>
                <div class="category-content m-3">
                  <div class="col-8">
                      <a href="{{url('tetapkan_kategori')}}"><button type="button" class="btn btn-primary btn-sm">Tetapkan Kategori</button></a>
                      <a href="{{url('tambah_produk')}}"><button type="button" class="btn btn-primary btn-sm">Buat Produk</button></a>
                  </div>
                  <div class="table-responsive  m-3">
                        <table class="table table-striped border" id="table-datatables" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th>Pilih</th>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                                <tr>
                                    <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                    <td>Rinso</td>
                                    <td>
                                        <div class="button d-sm-flex justify-content-center align-content-center mb-4">
                                            <button type="submit" class="btn btn-primary btn-icon-split p-3">
                                                <span class="icon text-white">
                                                    <i class="ti-plus"></i>
                                                </span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                  <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                                    <td>So klin</td>
                                    <td>
                                        <div class="button d-sm-flex justify-content-center align-content-center mb-4">
                                            <button type="submit" class="btn btn-primary btn-icon-split p-3">
                                                <span class="icon text-white">
                                                    <i class="ti-plus"></i>
                                                </span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                      </div>
                      <div class="button-action d-flex justify-content-between m-3">
                        <button class="btn btn-primary" type="button" style="width:20%;"><i class="ti-check me-2" href="tambah_kategori.html"></i>Pilih Semua</button>
                        <button class="btn btn-success berhasil" type="button" style="width:20%;"><i class="ti-save me-2" href="tambah_kategori.html"></i>Simpan</button>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection