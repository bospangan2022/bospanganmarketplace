@extends('layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container-fluid bg-white p-3">
            <div class="content-header mb-3 border-bottom ">
                <a class="btn text-primary mb-3" href="{{url('fixedorder')}}" role="button"><i class="ti-angle-left me-3"></i>KEMBALI KE DAFTAR PESANAN</a>
                <a class="btn text-primary mb-3" href="{{url('edit_pesanan')}}" role="button"><i class="ti-pencil me-3"></i>PERBAIKI PESANAN</a>
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
                <div class="row mb-3 ">
                    <div class="col-md-6">
                        <div class="row border-bottom mb-2 ">
                            <div class="col-sm-7 mb-3">
                                <p  class="fs-6"> EMAIL PELANGGAN</p>
                                <input type="text" class="form-control" id="validationCustom01" value="arifmohammad@gmail.com" required>
                            </div>
                            <div class="col-sm-5 d-flex justify-content-end align-items-lg-center text-info">
                                <i class="ti-email"></i>
                            </div>
                        </div>
                        <div class="row mb-2 border-bottom">
                            <div class="col-sm-10 mb-3">
                                <p  class="fs-6"> METODE PENGIRIMAN</p>
                                <input type="text" class="form-control" id="validationCustom01" value="Pengiriman daerah Blitar : Sanankulon, Garum, Kanigoro, Nglegok" required>
                            </div>
                            <div class="col-sm-2 d-flex justify-content-end align-items-lg-center text-info">
                                <i class="ti-truck"></i>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-10 mb-3">
                                <p  class="fs-6">METODE PEMBAYARAN</p>
                                <input type="text" class="form-control" id="validationCustom01" value="Bayar saat Pesanan Tiba" required>
                            </div>
                            <div class="col-sm-2 d-flex justify-content-end align-items-lg-center text-info">
                                <i class="ti-money"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="row  mb-2 ">
                            <div class="col-sm-10 mb-2 ">
                                <p  class="fs-6">PENAGIHAN DAN ALAMAT PENGIRIMAN</p>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Username</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" value="Mohammad Arif Sholehudin" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Alamat</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" value="jjgkblbn;lkblk fbwjfj Jawa Timur 5235246 Indonesia" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Telepon</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" value="0854654546456" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                            <div class="col-sm-2 d-flex justify-content-end align-items-lg-center text-info">
                                <i class="ti-map-alt"></i>
                            </div>
                        </div> 
                    </div>
                <div> 
                <div class="row border-bottom border-top  mb-2 ">
                    <div class="col-sm-6 mb-2">
                        <div class="row mb-2 mt-3">
                            <div class="col-3">
                                <img src="{{asset('assets/images/barang/barang1.jpg')}}" style="width: 100px;"alt="">
                            </div>
                            <div class="col-8 d-flex flex-column ">
                                <input type="text" class="form-control mb-2" id="validationCustom01" value="Tongkol Segar Dan Beku" required>
                                <div class="row">
                                    <div class="col-5 d-flex">
                                        <p class="text-muted mb-2 me-2 ">SKU:</p>
                                        <input type="text" class="form-control px-1 " id="validationCustom01" value="TKL01" required>
                                    </div>
                                    <div class="col-7 d-flex">
                                        <p class="text-muted mb-2 me-2 ">Berat:</p>
                                        <input type="text" class="form-control ps-1" id="validationCustom01" value="100" required>
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                            <option selected>Pilih Satuan</option>
                                            <option value="1">PCS</option>
                                            <option value="2">KG</option>
                                            <option value="3">RTG</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 d-flex justify-content-end align-items-lg-center">
                        <strong class="mb-2 ">Rp. </strong>
                        <strong class="mb-2 me-2 ">34.000 </strong>
                        <strong class="mb-2 me-2 text-muted ">X</strong>
                        <strong class="mb-2  ">1 </strong>
                    </div>
                    <div class="col-sm-1 d-flex justify-content-end align-items-lg-center">
                        <button type="submit" class="btn btn-danger btn-icon-split p-3">
                            <span class="icon text-white">
                                <i class="ti-trash"></i>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="row border-bottom mb-2 ">
                    <div class="col-sm-6 mb-2">
                        <div class="row mb-2 mt-3">
                            <div class="col-3">
                                <img src="{{asset('assets/images/barang/barang1.jpg')}}" style="width: 100px;"alt="">
                            </div>
                            <div class="col-8 d-flex flex-column ">
                                <input type="text" class="form-control mb-2" id="validationCustom01" value="Tongkol Segar Dan Beku" required>
                                <div class="row">
                                    <div class="col-5 d-flex">
                                        <p class="text-muted mb-2 me-2 ">SKU:</p>
                                        <input type="text" class="form-control px-1 " id="validationCustom01" value="TKL01" required>
                                    </div>
                                    <div class="col-7 d-flex">
                                        <p class="text-muted mb-2 me-2 ">Berat:</p>
                                        <input type="text" class="form-control ps-1" id="validationCustom01" value="100" required>
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                            <option selected>Pilih Satuan</option>
                                            <option value="1">PCS</option>
                                            <option value="2">KG</option>
                                            <option value="3">RTG</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 d-flex justify-content-end align-items-lg-center">
                        <strong class="mb-2 ">Rp. </strong>
                        <strong class="mb-2 me-2 ">34.000 </strong>
                        <strong class="mb-2 me-2 text-muted ">X</strong>
                        <strong class="mb-2  ">1 </strong>
                    </div>
                    <div class="col-sm-1 d-flex justify-content-end align-items-lg-center">
                        <button type="submit" class="btn btn-danger btn-icon-split p-3 hapus">
                            <span class="icon text-white">
                                <i class="ti-trash"></i>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="row d-flex justify-content-end mb-3">
                    <div class="col-6">
                        <a data-toggle="modal" data-target="#tambah" class="btn btn-info  ">Tambah Pesanan</a>
                    </div>
                        <table class="col-6 mt-3 ">
                          <tr>
                            <td>Subtotal</td>
                            <td align="right">
                                <div class="input-group input-group-sm mb-3" style="width:200px;">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Rp</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" value="100" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td>Delivery</td>
                            <td align="right">
                            <div class="input-group input-group-sm mb-3" style="width:200px;">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Rp</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" value="100" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td>Pajak</td>
                            <td align="right">
                                <div class="input-group input-group-sm mb-3" style="width:200px;">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Rp</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" value="100" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td>Diskon</td>
                            <td align="right">
                            <div class="input-group input-group-sm mb-3" style="width:200px;">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Rp</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" value="100" aria-describedby="inputGroup-sizing-sm">
                                </div>
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
                        <div class="d-flex justify-content-md-end mt-5">
                            <button type="submit" class="btn btn-primary berhasil"><i class="ti-save me-2"></i>Simpan</button>
                        </div>
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
    
<script>
document.querySelector(".berhasil").addEventListener('click', function(){
  Swal.fire("Data Berhasil Tersimpan", "Klik ok untuk menutup pop up!", "success");
});
</script>
 <script>
     document.querySelector(".hapus").addEventListener("click", function() {
  Swal.fire({
    title: "Yakin Item Di Hapus?",
    type: "info",
    showCancelButton: true,
    confirmButtonText: "Delete It",
    confirmButtonColor: "#ff0055",
    cancelButtonColor: "#999999",
    reverseButtons: true,
    focusConfirm: false,
    focusCancel: true
  });
});
 </script>
  @endsection

