@extends('layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid">
                <h2 class="produk-title">Produk</h2>
                <!--Button-->
                <div class="col-10 d-flex justify-content-between align-items-stretch my-1">
                    <a class="btn btn-primary" href="{{ url('tambah_produk') }}" role="button"><i
                            class="ti-plus me-2"></i>Produk Baru</a>

                </div>
                <!--Search-->
                <form action="{{ url('cari_produk') }}">
                    <div class="input-group my-4">
                        <span class="input-group-text" id="basic-addon1"><i class="ti-search"></i></span>
                        <input type="text" name="cari" class="form-control" placeholder="Nama Produk SKU"
                            aria-label="Username" aria-describedby="basic-addon1" />
                    </div>
                </form>
                <!--Filter-->
                <div class="row">
                    <div class="accordion col-3" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingZero">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseZero" aria-expanded="true" aria-controls="collapseZero">
                                    Filter Data Pemesanan
                                </button>
                            </h2>
                            <div id="collapseZero" class="accordion-collapse collapse show" aria-labelledby="headingZero"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="tags d-flex justify-content-between my-2">
                                        <a href="#" style="text-decoration: none">All Products</a>
                                        <span>{{ $jumlah }}</span>
                                    </div>
                                    <div class="tags d-flex justify-content-between my-2">
                                        <a href="#" style="text-decoration: none">Displayed on storefront</a>
                                        <span>{{ $jumlah }}</span>
                                    </div>
                                    <div class="tags d-flex justify-content-between my-2">
                                        <a href="#" style="text-decoration: none">Out of stock</a>
                                        <span>0</span>
                                    </div>
                                    <div class="tags d-flex justify-content-between my-2">
                                        <a href="#" style="text-decoration: none">Disabled</a>
                                        <span>0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Kategori
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    @foreach ($kat as $kat)
                                        <div class="form-check d-flex justify-content-between my-3">
                                            <a href="{{ url('filter_kategori', $kat->id_kategori) }}"
                                                style="text-decoration: none">
                                                {{ $kat->nama_kategori }}
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Filter End-->
                    <!--Main Content-->
                    <div class="col-9 ">

                        <div class="card">
                            @foreach ($search as $b)
                                <div class=" ps-3 mt-3">
                                    <!--Daftar Produk-->
                                    <div class="row border-bottom m-4">
                                        <div class="col-2">
                                            <img class="rounded-3 mb-3" style="width:120px;"
                                                src="images/post/{{ $b->foto }}" />
                                        </div>
                                        <div class="col-5">
                                            <div class="d-flex">
                                                <h4 class="title_barang">{{ $b->nama_barang }}</h4>
                                                <h4 class="title_sku">{{ $b->sku }}</h4>
                                            </div>
                                            <div class="switch">
                                                <div class="form-check form-switch ms-5">
                                                    <input class="form-check-input " type="checkbox" role="switch"
                                                        id="flexSwitchCheckChecked" checked>
                                                    <label class="form-check-label m-0  "
                                                        for="flexSwitchCheckChecked">Aktifkan Persediaan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="aksi col-3">
                                            <h4 class="title_harga">@currency($b->harga)</h4>
                                            <div class="delete">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" method="POST"
                                                    action="{{ url('delete_produk', $b->id_barang) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-icon-split  mr-lg-2">
                                                        <span class="icon text-white">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                        <span class="text">Hapus</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-1 d-flex justify-content-lg-center align-items-md-center">
                                            <a class="btn" href="{{ url('edit_produk', $b->id_barang) }}"
                                                role="button"><i class="ti-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- <div class="d-flex justify-content-center mt-5">
                       {{ $page->links() }}
                     </div> --}}
                    </div>
                </div>

            </div>



        @endsection
        @section('js')
            <script language="JavaScript">
                function toggle(source) {
                    checkboxes = document.getElementsByName('foo');
                    for (var i = 0, n = checkboxes.length; i < n; i++) {
                        checkboxes[i].checked = source.checked;
                    }
                }
            </script>
        @endsection
