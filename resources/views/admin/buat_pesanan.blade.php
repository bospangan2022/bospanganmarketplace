@extends('layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container-fluid bg-white p-3">
            <div class="content-header mb-3 border-bottom ">
                <a class="btn text-primary mb-3" href="{{url('fixedorder')}}" role="button"><i class="ti-angle-left me-3"></i>KEMBALI KE DAFTAR PESANAN</a>
            </div>
            <div class="content-body mx-5 p-3 mt-3 fs-4">
                <div class="row mb-3 border-bottom ">
                    <div class="col-md-8">
                        <div class="product mb-2">
                                <span class="fs-3"> Pesanan Baru</span>
                        </div>
                        <div class="status d-flex mb-2">
                            <p class="fs-6 "> MENUNGGU PEMBAYARAN</p>
                            <p class="fs-6 me-2 "> ,</p>
                            <p class="fs-6 "> MENUNGGU PROSES</p>
                        </div>
                        <div class="auth d-flex mb-2">
                            <p class="fs-6 me-2 "> Ditempatkan Oleh</p>
                            <p class="fs-6 text-info ">Anonim</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="date d-flex mb-2 text-left justify-content-end">
                            <span class="fs-3 me-3"> Total Rp.</span>
                            <span class="fs-3"> 0</span>
                        </div>
                        <div class="auth d-flex mb-2 text-muted justify-content-end">
                            <p class="fs-6 me-2 "> 0</p>
                            <p class="fs-6 "> item</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-3 ">
                    <div class="col-md-6">
                        <div class="row border-bottom mb-2 ">
                            <div class="col-sm-7 mb-2">
                                <p  class="fs-6"> EMAIL PELANGGAN</p>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="email pelanggan">
                            </div>
                            <div class="col-sm-5 d-flex justify-content-end align-items-lg-center text-info">
                                <i class="ti-email"></i>
                            </div>
                        </div>
                        <div class="row mb-2 border-bottom">
                            <div class="col-sm-10 mb-2">
                                <p  class="fs-6"> METODE PENGIRIMAN</p>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="" required>
                            </div>
                            <div class="col-sm-2 d-flex justify-content-end align-items-lg-center text-info">
                                <i class="ti-truck"></i>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-10 mb-2">
                                <p  class="fs-6">METODE PEMBAYARAN</p>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="" required>
                            </div>
                            <div class="col-sm-2 d-flex justify-content-end align-items-lg-center text-info">
                                <i class="ti-money"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="row  mb-2 ">
                            <div class="col-sm-10 mb-2">
                                <p  class="fs-6">PENAGIHAN DAN ALAMAT PENGIRIMAN</p>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Username</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" placeholder="" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Alamat</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" placeholder="Tuliskan Alamat Lengkap" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Telepon</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" placeholder="" aria-describedby="inputGroup-sizing-sm">
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
                            
                        </div>
                    </div>
                    <div class="col-sm-5 d-flex justify-content-end align-items-lg-center">
                        
                    </div>
                    <div class="col-sm-1 d-flex justify-content-end align-items-lg-center">
                        
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
                                    <input type="text" class="form-control" aria-label="Sizing example input" value="" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td>Delivery</td>
                            <td align="right">
                            <div class="input-group input-group-sm mb-3" style="width:200px;">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Rp</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" value="" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td>Pajak</td>
                            <td align="right">
                                <div class="input-group input-group-sm mb-3" style="width:200px;">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Rp</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" value="" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td>Diskon</td>
                            <td align="right">
                            <div class="input-group input-group-sm mb-3" style="width:200px;">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Rp</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" value="" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td><b>Total</b></td>
                            <td align="right">
                              <strong>Rp.</strong>
                              <strong>0</strong> 
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
  @endsection

