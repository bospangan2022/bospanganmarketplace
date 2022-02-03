@extends('layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
       <div class="container-fluid">
          <h2 class="title bold">Kategori</h2>
          <!--Button-->
          <div class="col-sm-4  d-flex justify-content-between align-items-stretch my-4" >
                <a class="btn btn-primary" href="{{url('tambah_kategori')}}" role="button"><i class="ti-plus me-2"></i>Tambah Kategori</a>
                 <button class="btn btn-primary hapus " type="submit">Hapus Kategori</button>
              </div>
          <!--Filter-->
          <div class="row">
              <div class="col-3 bg-white border p-3">
               <h4 class="font-weight-bold"><b>Kategori</b></h4>
               @foreach($menu as $kat)
                <div class="tags d-flex my-3">
                  <a href="{{url('kategori',$kat->id_kategori)}}" style="text-decoration: none">{{$kat->nama_kategori}}</a>
                </div>
                @endforeach
              </div>
              <!--Filter End-->
              <!--Main Content-->
              <div class="col-9 bg-white border ">
                <div class="category-header" style="background-color: #f4f5f7;">
                  <div class="title d-flex p-3 m-3">
                  @foreach($kategori as $kat)
                    <strong class="fs-3">{{$kat->nama_kategori}}<strong>
                    @endforeach
                  </div>
                  <div class="category-nav m-3">
                    <ul class="nav nav-pills">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('kategori',$kat->id_kategori)}}">Umum</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{url('kategori_produk')}}">Kategori Produk</a>
                      </li> 
                    </ul> 
                  </div>
                </div>
                <div class="category-content m-3">
                    <div class="col-8 ms-3">
                      <a href="{{url('tambah_produk')}}"><button type="button" class="btn btn-primary btn-sm">Buat Produk</button></a>
                    </div>
                    <div class="table-responsive  m-3">
                        <table class="table table-striped border" id="table-datatables" width="100%" cellspacing="0">
                            <thead align = "center">
                                <tr>
                                    <th>SKU</th>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody align= "center">
                            @foreach($produk as $prd)
                                <tr>
                                    <td>{{$prd->sku}}</td>
                                    <td>{{$prd->nama_barang}}</td>
                                    <td>
                                        <div class="button d-sm-flex justify-content-center align-content-center mb-4">
                                            <a href="{{url('hapus_kategoriProduk',$prd->id_barang)}}"type="submit" class="btn btn-danger btn-icon-split p-3 hapus">
                                                <span class="icon text-white">
                                                    <i class="ti-trash"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
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
                $('#table-datatables').DataTable({
                    dom: 'Bfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                });
            });
        </script>
@endsection