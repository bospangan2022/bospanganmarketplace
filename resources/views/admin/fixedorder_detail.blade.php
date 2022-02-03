@extends('layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container-fluid bg-white p-3">
            <div class="content-header mb-3 border-bottom ">
                <a class="btn text-primary mb-3" href="{{url('fixedorder')}}" role="button"><i class="ti-angle-left me-3"></i>KEMBALI KE DAFTAR PESANAN</a>
                <a class="btn text-primary mb-3" href="{{url('edit_detail')}}" role="button"><i class="ti-pencil me-3"></i>PERBAIKI PESANAN</a>
            </div>
            <div class="content-body mx-5 p-3 mt-3 fs-4">
                <a class="btn text-primary p-0 fs-5 mb-2" href="{{url('fixedorder')}}" role="button"> Print Order</a>
                <div class="row mb-3 border-bottom ">
                    <div class="col-md-8">
                        <div class="product mb-2">
                            <a href="{{url('pemesanan')}}" style="text-decoration:none;">
                                <span class="fs-3"> Pesan</span>
                                <span class="fs-3"> #</span>
                                <span class="fs-3"> BASEP</span>
                                <i class="ti-angle-right"></i>
                            </a>
                        </div>
                        <div class="status d-flex mb-2">
                            <p class="fs-6 "> DANA TELAH DIKEMBALIKAN SEBAGIAN</p>
                            <p class="fs-6 me-2 "> ,</p>
                            <p class="fs-6 "> TIDAK AKAN DIANTAR</p>
                        </div>
                        <div class="auth d-flex mb-2">
                            <p class="fs-6 me-2 "> Ditempatkan Oleh</p>
                            <p class="fs-6 text-info "> Sandra Destya</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="status d-flex mb-2 text-left text-muted justify-content-end">
                            <p class="fs-6 me-2 "> Sab, Desember 18, 2021</p>
                            <p class="fs-6 "> 10:28</p>
                        </div>
                        <div class="date d-flex mb-2 text-left justify-content-end">
                            <span class="fs-3 me-3"> Total Rp.</span>
                            <span class="fs-3"> 42.000</span>
                        </div>
                        <div class="auth d-flex mb-2 text-muted justify-content-end">
                            <p class="fs-6 me-2 "> 1</p>
                            <p class="fs-6 "> item</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-3 border-bottom ">
                    <div class="col-md-6">
                        <div class="row border-bottom mb-2 ">
                            <div class="col-sm-6 mb-2">
                                <p  class="fs-6"> EMAIL PELANGGAN</p>
                                <a href="#" style="text-decoration:none;" ><p class="fs-6">arifmohammad@gmail.com</p></a>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-end align-items-lg-center text-info">
                                <i class="ti-email"></i>
                            </div>
                        </div>
                        <div class="row mb-2 border-bottom">
                            <div class="col-sm-6 mb-2">
                                <p  class="fs-6"> METODE PENGIRIMAN</p>
                                <p class="fs-6">Pengiriman daerah Blitar : Sanankulon, Garum, Kanigoro, Nglegok</p>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-end align-items-lg-center text-info">
                                <i class="ti-truck"></i>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-6 mb-2">
                                <p  class="fs-6">METODE PEMBAYARAN</p>
                                <p class="fs-6">Bayar saat Pesanan Tiba</p>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-end align-items-lg-center text-info">
                                <i class="ti-money"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="row  mb-2 ">
                            <div class="col-sm-6 mb-2">
                                <p  class="fs-6">PENAGIHAN DAN ALAMAT PENGIRIMAN</p>
                                <p class="fs-6">Mohammad Arif Sholehudin</p>
                                <p class="fs-6">jjgkblbn;lkblk fbwjfj Jawa Timur 5235246 Indonesia</p>
                                <div class="d-flex">
                                    <p class="fs-6">Telpon:</p>
                                    <p class="fs-6">0854654546456</p>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-end align-items-lg-center text-info">
                                <i class="ti-map-alt"></i>
                            </div>
                        </div> 
                    </div>
                <div> 
                <div class="row border-bottom  mb-2 ">
                    <div class="col-sm-6 mb-2">
                        <div class="row mb-2 mt-3">
                            <div class="col-3">
                                <img src="{{asset('assets/images/barang/barang1.jpg')}}" style="width: 100px;"alt="">
                            </div>
                            <div class="col-8 d-flex flex-column ">
                                <strong class="mb-2 ">Tongkol Segar dan Beku </strong>
                                <div class="row">
                                    <div class="col-3 d-flex">
                                        <p class="text-muted mb-2 ">SKU:</p>
                                        <p class="text-muted mb-2 ">ISF7</p>
                                    </div>
                                    <div class="col-3 d-flex">
                                        <p class="text-muted mb-2 ">Berat:</p>
                                        <p class="text-muted mb-2 ">100</p>
                                        <p class="text-muted mb-2 ">Kg</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end align-items-lg-center">
                        <strong class="mb-2 ">Rp. </strong>
                        <strong class="mb-2 me-2 ">34.000 </strong>
                        <strong class="mb-2 me-2 text-muted ">X</strong>
                        <strong class="mb-2  ">1 </strong>
                    </div>
                </div>
                <div class="row border-bottom mb-2 ">
                    <div class="col-sm-6 mb-2">
                        <div class="row mb-2 mt-3">
                            <div class="col-3">
                                <img src="{{asset('assets/images/barang/barang1.jpg')}}" style="width: 100px;"alt="">
                            </div>
                            <div class="col-8 d-flex flex-column ">
                                <strong class="mb-2 ">Tongkol Segar dan Beku </strong>
                                <div class="row">
                                    <div class="col-3 d-flex">
                                        <p class="text-muted mb-2 ">SKU:</p>
                                        <p class="text-muted mb-2 ">ISF7</p>
                                    </div>
                                    <div class="col-3 d-flex">
                                        <p class="text-muted mb-2 ">Berat:</p>
                                        <p class="text-muted mb-2 ">100</p>
                                        <p class="text-muted mb-2 ">Kg</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end align-items-lg-center">
                        <strong class="mb-2 ">Rp. </strong>
                        <strong class="mb-2 me-2 ">34.000 </strong>
                        <strong class="mb-2 me-2 text-muted ">X</strong>
                        <strong class="mb-2  ">1 </strong>
                    </div>
                </div>
                <div class="row d-flex justify-content-end mb-3">
                        <div class="col-6">
                            <a data-toggle="modal" data-target="#tambah" class="btn btn-info  ">Tambah Pesanan</a>
                        </div>
                        <table class="col-6 mt-3 ">
                          <tr>
                            <td>Barang</td>
                            <td align="right">
                              <strong>Rp.</strong>
                              <strong>34.000</strong> 
                            </td>
                          </tr>
                          <tr>
                            <td>Delivery</td>
                            <td align="right">
                              <strong>Rp.</strong>
                              <strong>4.000</strong> 
                            </td>
                          </tr>
                          <tr>
                            <td>Pajak</td>
                            <td align="right">
                              <strong>Rp.</strong>
                              <strong>0</strong> 
                            </td>
                          </tr>
                          <tr>
                            <td><b>Total</b></td>
                            <td align="right">
                              <strong>Rp.</strong>
                              <strong>38.000</strong> 
                             </td>
                          </tr>
                        </table>
                      </div>
                    </div>
                </div>    
            <div>
        </div>
    </div>

    <!--Modal Details-->
 <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3">
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">SKU</label>
                            <input type="text" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-8">
                            <label for="inputPassword4" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">Jumlah Pembelian</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="col-md-4">
                            <label for="inputState" class="form-label">Satuan</label>
                            <select id="inputState" class="form-select">
                                <option selected>Pilih Satuan</option>
                                <option value="1">PCS</option>
                                <option value="2">KG</option>
                                <option value="3">RTG</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>             
        </div>
    </div>            
              

  
@endsection
@section('js')
   <script language="JavaScript">
      function toggle(source) {
  checkboxes = document.getElementsByName('foo');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
    </script>
  @endsection

