@extends('layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid">
                <h2 class="title">Produk</h2>
                <!--Button-->
                <div class="title-list-wide col-10 ">
                    <div class="list-detail">
                        <a class="btn btn-primary list-detai" href="{{ url('tambah_produk') }}" role="button"><i
                                class="ti-plus me-2"></i>Produk Baru</a>
                    </div>
                    <div class="list-detail">
                        <button class="btn btn-primary" type="submit">Export Product</button>
                    </div>
                    <div class="list-detail">
                        <form action="" method="" enctype="multipart/form-data">
                            <label for="upload">Import</label>
                            <div class="import-box">
                                <input type="file" class="btn btn-primary btn-icon-split ml-3" name="bukti"
                                    style="width: 200px;">
                                <button type="submit" class="btn btn-primary btn-icon">
                                    <i class="ti-download"></i>
                                </button>
                            </div>
                        </form>
                    </div>
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
                <div class="row content-main ">
                    <div class="accordion-filter col-4">
                        <div class="filter-title mb-3">
                            <h4><b>Filter Berdasarkan :</b></h4>
                        </div>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingZero">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseZero" aria-expanded="true" aria-controls="collapseZero">
                                        Filter Data Pemesanan
                                    </button>
                                </h2>
                                <div id="collapseZero" class="accordion-collapse collapse show"
                                    aria-labelledby="headingZero" data-bs-parent="#accordionExample">
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
                                        <div class="search d-flex mx-0">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="ti-search"></i></span>
                                            <input type="text" class="form-control" placeholder="Nama kategori"
                                                aria-label="Username" aria-describedby="basic-addon1" />
                                        </div>
                                        @foreach ($kategori as $kat)
                                            <div class="form-check d-flex justify-content-between my-3">
                                                <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                                    {{ $kat->nama_kategori }}
                                                </label>
                                                <input class="form-check-input " type="checkbox" value=""
                                                    id="flexCheckChecked" checked>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Tersedianya
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="form-check d-flex justify-content-between my-3">
                                            <label class="form-check-label ms-0 fs-6" for="flexRadioDefault2">
                                                Apa Saja
                                            </label>
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2" checked>
                                        </div>
                                        <div class="form-check d-flex justify-content-between my-3">
                                            <label class="form-check-label ms-0 fs-6" for="flexRadioDefault2">
                                                Nonaktifkan
                                            </label>
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2">
                                        </div>
                                        <div class="form-check d-flex justify-content-between my-3">
                                            <label class="form-check-label ms-0 fs-6" for="flexRadioDefault2">
                                                Diaktifkan
                                            </label>
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Status Stok
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="form-check d-flex justify-content-between my-3">
                                            <label class="form-check-label ms-0 fs-6" for="flexRadioDefault2">
                                                Apa Saja
                                            </label>
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2" checked>
                                        </div>
                                        <div class="form-check d-flex justify-content-between my-3">
                                            <label class="form-check-label ms-0 fs-6" for="flexRadioDefault2">
                                                Stok Habis
                                            </label>
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2">
                                        </div>
                                        <div class="form-check d-flex justify-content-between my-3">
                                            <label class="form-check-label ms-0 fs-6" for="flexRadioDefault2">
                                                Persediaan
                                            </label>
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Product Type
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="form-check d-flex justify-content-between my-3">
                                            <label class="form-check-label ms-0 fs-6" for="flexRadioDefault2">
                                                Any
                                            </label>
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2" checked>
                                        </div>
                                        <div class="form-check d-flex justify-content-between my-3">
                                            <label class="form-check-label ms-0 fs-6" for="flexRadioDefault2">
                                                Pay What you want product
                                            </label>
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2">
                                        </div>
                                        <div class="form-check d-flex justify-content-between my-3">
                                            <label class="form-check-label ms-0 fs-6" for="flexRadioDefault2">
                                                Gift Card Product
                                            </label>
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        Ribbons
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="search d-flex mx-0">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="ti-search"></i></span>
                                            <input type="text" class="form-control" placeholder="nama kategori"
                                                aria-label="Username" aria-describedby="basic-addon1" />
                                        </div>
                                        <div class="form-check d-flex justify-content-between my-3">
                                            <label class="form-check-label fs-6 ms-0" for="flexCheckChecked">
                                                Apa Saja
                                            </label>
                                            <input class="form-check-input " type="checkbox" value="" id="flexCheckChecked"
                                                checked>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Filter End-->
                    <!--Main Content-->
                    <div class="col-8 card-content">
                        <div class="navigasi my-3 ">
                            <div class="nav-dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Urutkan
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Nama: A-Z</a></li>
                                    <li><a class="dropdown-item" href="#">Nama: Z-A</a></li>
                                    <li><a class="dropdown-item" href="#">SKU: Ascending</a></li>
                                    <li><a class="dropdown-item" href="#">SKU: Descending</a></li>
                                    <li><a class="dropdown-item" href="#">Price: Lower First</a></li>
                                    <li><a class="dropdown-item" href="#">Price: Higher First</a></li>
                                    <li><a class="dropdown-item" href="#">Date Added: Most Recent First</a></li>
                                    <li><a class="dropdown-item" href="#">Date Modified: Most Recent First</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            @foreach ($page as $b)
                                <div class="card-lg ps-3 mt-3">
                                    <!--Daftar Produk-->
                                    <div class="row border-bottom m-4">
                                        <div class="col-2">
                                            <img class="rounded-3 mb-3" style="width:120px;"
                                                src="images/post/{{ $b->foto }}" />
                                        </div>
                                        <div class="col-5 ms-3">
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
                                            <h4 class="title_harga">Rp. {{ $b->harga }}</h4>
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
                                <div class="card-mobile ps-3 mt-3">
                                    <!--Daftar Produk-->
                                    <div class="row border-bottom ">
                                        <div class="product-col col-9">

                                            <div class="img-product d-flex justify-content-center mb-2">
                                                <img class="rounded-3 mb-3" style="width:120px;"
                                                    src="images/post/{{ $b->foto }}" />
                                            </div>
                                            <div class="title-product mb-2">
                                                <h4 class="title_barang">{{ $b->nama_barang }}</h4>
                                                <h4 class="title_sku">{{ $b->sku }}</h4>
                                            </div>
                                            <div class="display-product d-flex justify-content-center mb-2 ">
                                                <h4 class="title_barang"><i class="ti-eye"></i></h4>
                                                <?php if ($b->status == "Tampilkan") { ?>
                                                <h4 class="title_barang text-success">Ditampilkan</h4>
                                                <?php } else { ?>
                                                <h4 class="title_barang text-muted">Disembunyikan</h4>
                                                <?php } ?>
                                            </div>
                                            <div class="price-product d-flex flex-column align-items-center mb-2 ">
                                                <h4 class="title_harga">Rp. {{ $b->harga }}</h4>
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" method="POST"
                                                    action="{{ url('delete_produk', $b->id_barang) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm  mr-lg-2">
                                                        <span class="icon text-white">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                        <span class="text">Hapus</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="product-btn col-2 d-flex align-items-center justify-content-center ">
                                            <a class="btn" href="{{ url('edit_produk', $b->id_barang) }}"
                                                role="button"><i class="ti-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            {{ $page->links() }}
                        </div>
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
