@extends('layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
       <div class="container-fluid">
          <div class="conntainer-title col-6 d-flex">
            <h2 class="title bold me-2">Pemesanan </h2>
            <h2 class="title bold"># </h2>
            <h2 class="title bold">B3848 </h2>
          </div>
          <a class="text-primary" href="" style="text-decoration: none;">Cetak</a>
          <a class="text-primary" href="{{url('edit_detail')}}" style="text-decoration: none;">Edit Pesanan</a>
        </div>
          
            <!--Button-->
            <form>
            <div class="row d-flex">
              <div class="col-8">
                <div class="image-list card my-2">
                    <div class="card-body d-flex justify-content border-bottom">
                        <span class="title bold  me-1">Rp.42.000</span>
                        <span class="title bold  me-1"> —</span>
                        <span class="title bold  me-1">Sab, Desember 18, 2021</span>
                        <span class="title bold  me-1"> 10:28</span>       
                    </div>
                    <div class="row">
                      <div class="col-6">
                          <strong class="btn me-2 pb-2 ">Status pembayaran</strong>
                          <div class="btn btn me-2 pt-0 ">
                            <select class="form-select" aria-label="">
                                <option selected>Pilih Status Pembayaran</option>
                                <option value="1">Telah Dibayar</option>
                                <option value="2">Menunggu Pembayaran</option>
                                <option value="3">Dibatalkan</option>
                                <option value="4">Biaya telah dikembalikan</option>
                                <option value="5">Dana telah dikembalikan sebagian</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-6">
                          <strong class="btn me-2 pb-2 ">Status pemenuhan</strong>
                          <div class="btn btn me-2 pt-0 ">
                              <select class="form-select" aria-label="">
                                <option selected>Pilih Status Pemenuhan</option>
                                <option value="1">Menunggu Proses</option>
                                <option value="2">Sedang diproses</option>
                                <option value="3">Siap untuk Diambil</option>
                                <option value="4">Telah Dikirim</option>
                                <option value="5">Sedang Dikirim</option>
                                <option value="6">Dikirim</option>
                                <option value="7">Pengiriman Dibatalkan</option>
                                <option value="8">Telah Dikembalikan</option>
                              </select>
                          </div>
                      </div>
                    </div>         
                </div>
                <div class="form-input card mb-4">
                    <div class="card-body">
                        <div class="form-list mb-1 border-bottom">
                            <div class="mb-2">
                              <strong class="me-2 text-muted  ">Komentar pelanggan</strong>
                            </div>
                            <div class="mb-2">
                              <p class=" me-2 ">kemal ganateng banget</p>  
                            </div>
                        </div>
                        <div class="form-list my-3 ">
                          <div class="mb-2">
                            <strong class="me-2 text-muted  ">Catatan Karyawan</strong>
                          </div>
                          <div class="">
                            <textarea class="form-control mb-2" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <p class=" me-2 text-muted "><i class="ti-lock me-1"></i> Catatan pesanan tidak dapat dilihat oleh pelanggan.</p>
                          </div>
                          <div class="col-3 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary btn-icon-split p-2 berhasil">
                              <span class="icon text-white">
                                  <i class=""></i>simpan
                              </span>
                            </button> 
                            <button type="submit" class="btn btn-danger btn-icon-split p-2">
                              <span class="icon text-white">
                                  <i class=""></i>batal
                              </span>
                            </button> 
                          </div>
                        </div>
                      </div>
                    </div>
                  <div class="form-input card mb-4">
                    <div class="card-body">
                      <div class="form-list mb-1 border-bottom">
                        <div class="mb-2 d-flex">
                          <strong class="me-2 text-muted  ">item pesanan: </strong>
                          <strong class="me-2 text-muted  ">1 </strong>
                        </div>
                        <div class="row mb-5">
                          <div class="col-3">
                            <img src="{{asset('assets/images/barang/barang1.jpg')}}" style="width: 100px;"alt="">
                          </div>
                          <div class="col-5 d-flex flex-column ">
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
                          <div class="col-4 d-flex justify-content-end ">
                            <strong class="mb-2 ">Rp. </strong>
                            <strong class="mb-2 ">34.000 </strong>
                          </div>
                        </div>
                      </div>
                      <div class="table-borderless d-flex justify-content-end">
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
                <div class="form-input card mb-4">
                  <div class="card-body">
                      <div class="mb-2 d-flex">
                        <strong class="mb-2 text-muted  ">Informasi Tambahan: </strong>
                      </div>
                      <div class="mb-2 d-flex">
                        <span class="mb-2   ">Alamat IP: </span>
                        <span class="mb-2   ">125.164.235.143 </span>
                      </div>
                      <div class="mb-2 d-flex">
                        <span class="mb-2   ">Accepts email marketing:</span>
                        <span class="mb-2   ">No, promo emails not allowed</span>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="form-input card mb-4">
                  <div class="card-body">
                    <div class="d-flex flex-column border-bottom">
                      <strong class="text-muted mb-2">Pelanggan</strong>
                      <strong class="mb-2">Mohammad Arif Sholehudin</strong>
                      <a href="#" class="mb-2"><p>arifmohamad@gmail.com</p></a>
                      <div class="d-flex mb-2">
                        <p>Telpon:</p>
                        <p>089897827987</p>
                      </div>
                    </div>
                    <div class="d-flex flex-column mt-3">
                        <strong class="text-muted mb-2">Delivery Details</strong>
                        <p class="mb-2">Customer choice: Pengiriman daerah Blitar : Sanankulon, Garum, Kanigoro, Nglegok,Rp.8000</p>
                        <p class="mb-2">Berat: 1.00 Kg</p>
                        <a href="#" class="mb-2"><p>tandai sebagai dikirim</p></a>
                    </div>
                    <div class="d-flex flex-column border-bottom mt-3">
                      <strong class="text-muted mb-2">Billing and delivery address</strong>
                      <p class="mb-2">Mohammad Arif Sholehudin</p>
                      <p class="mb-2">Jalan Ciliwung</p>
                      <p class="mb-2">Blitar, Jawa Timur 66137</p>
                      <p class="mb-2">Indonesia</p>
                      <div class="d-flex mb-2">
                        <p>Telpon:</p>
                        <p>089897827987</p>
                      </div>
                      <a href="#" class="mb-2"><p> tunjukkan di peta<i class="ti-location-pin"></i></p></a>
                    </div>
                    <div class="d-flex flex-column border-bottom mt-3">
                      <strong class="text-muted mb-2">Rincian Pembayaran</strong>
                      <p class="mb-2">Bayar Saat Pesanan Tiba</p>
                    </div>
                  </div>
                    
              </div> 
            </div> 
                    
                
                </div>
            </div>
        </div>
        
       
        </form>
        <!--End row-->
    </div>
</div>
</div>
@endsection