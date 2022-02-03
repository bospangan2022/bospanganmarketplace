@extends('layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container-fluid bg-white p-3">
            <div class="row mb-3">
                <div class="input-group col-6 mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="ti-search"></i></span>
                    <input type="text" class="form-control" placeholder="Keranjang barang, nama clien, pelanggan" aria-label="Username" aria-describedby="basic-addon1" />
                </div>
                <div class="col-6">
                <a class="btn btn-primary" href="{{url('buat_pesanan')}}" role="button">Buat Pesanan</a>
                </div>
            </div>
            <div class="container d-flex p-3 mt-3 border-bottom fs-4">
                <span class="me-3">Pesanan Anda</span>
                <span>(3)</span>
            </div> 
            <div class="container justify-content-center p-3 mt-3 border-bottom">
                <div class="row ms-2 mb-3">
                    <div class="col-md-8">
                        <div class="product mb-2">
                            <span class="fs-3"> #</span>
                            <span class="me-3 fs-3"> BASEP</span>
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
                    <div class="col-md-3">
                        <div class="status d-flex mb-2 text-left text-muted">
                            <p class="fs-6 me-2 "> Sab, Desember 18, 2021</p>
                            <p class="fs-6 "> 10:28</p>
                        </div>
                        <div class="date d-flex mb-2 text-left">
                            <span class="fs-3 me-3"> Total Rp.</span>
                            <span class="fs-3"> 42.000</span>
                        </div>
                        <div class="auth d-flex mb-2 text-muted">
                            <p class="fs-6 me-2 "> 1</p>
                            <p class="fs-6 "> item</p>
                        </div>
                    </div>
                    <div class="col-md-1 d-flex justify-content-lg-center align-items-md-center">
                        <a class="btn" href="{{url('fixedorder_detail')}}" role="button"><i class="ti-angle-right"></i></a>
                    </div>
                </div>
            </div> 
            <div class="container justify-content-center p-3 mt-3 border-bottom">
                <div class="row ms-2 mb-3">
                    <div class="col-md-8">
                        <div class="product mb-2">
                            <span class="fs-3"> #</span>
                            <span class="me-3 fs-3"> BASEP</span>
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
                    <div class="col-md-3">
                        <div class="status d-flex mb-2 text-left text-muted">
                            <p class="fs-6 me-2 "> Sab, Desember 18, 2021</p>
                            <p class="fs-6 "> 10:28</p>
                        </div>
                        <div class="date d-flex mb-2 text-left">
                            <span class="fs-3 me-3"> Total Rp.</span>
                            <span class="fs-3"> 42.000</span>
                        </div>
                        <div class="auth d-flex mb-2 text-muted">
                            <p class="fs-6 me-2 "> 1</p>
                            <p class="fs-6 "> item</p>
                        </div>
                    </div>
                    <div class="col-md-1 d-flex justify-content-lg-center align-items-md-center">
                        <a class="btn" href="{{url('fixedorder_detail')}}" role="button"><i class="ti-angle-right"></i></a>
                    </div>
                </div>
            </div> 
            <div class="container justify-content-center p-3 mt-3 border-bottom">
                <div class="row ms-2 mb-3">
                    <div class="col-md-8">
                        <div class="product mb-2">
                            <span class="fs-3"> #</span>
                            <span class="me-3 fs-3"> BASEP</span>
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
                    <div class="col-md-3">
                        <div class="status d-flex mb-2 text-left text-muted">
                            <p class="fs-6 me-2 "> Sab, Desember 18, 2021</p>
                            <p class="fs-6 "> 10:28</p>
                        </div>
                        <div class="date d-flex mb-2 text-left">
                            <span class="fs-3 me-3"> Total Rp.</span>
                            <span class="fs-3"> 42.000</span>
                        </div>
                        <div class="auth d-flex mb-2 text-muted">
                            <p class="fs-6 me-2 "> 1</p>
                            <p class="fs-6 "> item</p>
                        </div>
                    </div>
                    <div class="col-md-1 d-flex justify-content-lg-center align-items-md-center">
                        <a class="btn" href="{{url('fixedorder_detail')}}" role="button"><i class="ti-angle-right"></i></a>
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

