@extends('admin_toko.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="header-wrapper mb-4 ">
                <a class="tinggal" href="{{ url('produk_user') }}"><i class="icon-arrow-left me-2"></i>Kembali</a>
            </div>
            <div class="container-fluid">
                <h2 class="produk-title">Edit Produk</h2>
                <!--Button-->
                @foreach ($barang_id as $br)
                    <form action="{{ url('edit_produk_user/update', $br->id_barang) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row d-flex">
                            <div class="new-item col-8">
                                <div class="image-list card mb-4">
                                    <div class="card-body d-flex justify-content-around">

                                        <input type="file" name="foto" id="file">
                                        <label class="fotobarang" for="file">
                                            <i class="ti-plus me-2"></i> Pilih Foto Barang
                                        </label>
                                        <input type="hidden" class="form-control-file" id="hidden-image" name="hidden_image"
                                            value="{{ $br->foto }}">
                                    </div>
                                </div>
                                <div class="image-list-mobile card mb-4">
                                    <div class="card-body d-flex flex-column">
                                        <input type="file" name="foto" id="file" class="mb-2">
                                        <label class="fotobarang" for="file">
                                            <i class="ti-plus me-2"></i> Pilih Foto Barang
                                        </label>
                                        {{-- <div id="d_foto"></div> --}}
                                    </div>
                                </div>
                                <div class="form-input card mb-4">
                                    <div class="card-body">
                                        <div class="form-list d-flex justify-content-around mb-4">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <label for="nama" class="labelitem">Nama Barang</label>
                                                    <input type="text" id="" name="nama_barang" class="form-control"
                                                        style="height:30px;" value="{{ $br->nama_barang }}">
                                                </div>
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <label for="SKU" class="labelitem">SKU</label>
                                                    <input type="text" id="" name="sku" class="form-control"
                                                        style="height:30px;" aria-describedby="passwordHelpInline"
                                                        value="{{ $br->sku }}">
                                                </div>
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <label for="Berat" class="labelitem">Berat ( Kg )</label>
                                                    <input type="text" id="" name="berat" class="form-control"
                                                        style="height:30px;" aria-describedby="passwordHelpInline"
                                                        value="{{ $br->berat }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                id="floatingTextarea2" style="height: 100px"
                                                name="keterangan">{{ $br->keterangan }}</textarea>
                                            <label for="floatingTextarea2">Keterangan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-input-mobile card mb-4">
                                    <div class="card-body">
                                        <div class="form-list mb-4">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <label for="nama" class="labelitem">Nama Barang</label>
                                                    <input type="text" id="" name="nama_barang" class="form-control"
                                                        style="height:30px;" aria-describedby="passwordHelpInline">
                                                </div>
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <label for="SKU" class="labelitem">SKU</label>
                                                    <input type="text" id="" name="sku" class="form-control"
                                                        style="height:30px;" aria-describedby="passwordHelpInline">
                                                </div>
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <label for="Berat" class="labelitem">Berat ( Kg )</label>
                                                    <input type="text" id="" name="berat" class="form-control"
                                                        style="height:30px;" aria-describedby="passwordHelpInline">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                id="floatingTextarea2" style="height: 100px" name="keterangan"></textarea>
                                            <label for="floatingTextarea2">Keterangan</label>
                                        </div>
                                        <label class="labelitem" for="floatingTextarea2">Kategori</label>
                                        <div class="form-category d-flex justify-content-around mb-4">
                                            <select class="form-select" aria-label="Default select example"
                                                name="id_kategori">
                                                @foreach ($kategori as $kat)
                                                    <option value="{{ $kat->id_kategori }}">{{ $kat->nama_kategori }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-input card mb-4">
                                    <div class="card-body">
                                        <label class="labelitem" for="floatingTextarea2">Kategori</label>
                                        <div class="form-category d-flex justify-content-around my-4">
                                            <select class="form-select" aria-label="Default select example"
                                                name="id_kategori">
                                                @foreach ($kategori as $kat)
                                                    <option value="{{ $kat->id_kategori }}">{{ $kat->nama_kategori }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="new-item col-4">
                                <div class="price-form card mb-4">
                                    <div class="card-body">
                                        <label for="formGroupExampleInput" class="label-pricing">Pricing</label>
                                        <div class="mb-3 d-flex">
                                            <span class="input-group-text" style="height:50px;">Rp</span>
                                            <input type="text" name="harga" class="form-control" style="height:50px"
                                                placeholder="0" value="{{ $br->harga }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput2" class="label-harga">Harga Satuan</label>
                                            <input type="text" name="satuan" class="form-control mb-3" style="height:40px;"
                                                id="formGroupExampleInput2" placeholder="ons" value="{{ $br->satuan }}">
                                            <input type="text" name="harga_satuan" class="form-control mb-3"
                                                style="height:40px;" id="formGroupExampleInput2" placeholder="400"
                                                value="{{ $br->harga_satuan }}">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-avail card mb-4">
                                    <div class="card-body">
                                        <label for="formGroupExampleInput" class="form-label">Product
                                            availablity</label>
                                        <div class="select mb-4">
                                            <select name="status" class="form-select form-select-sm"
                                                aria-label=".form-select-sm example">
                                                <option selected disabled>{{ $br->status }}</option>
                                                <option value="Tampilkan">Tampilkan</option>
                                                <option value="Sembunyikan">Sembunyikan</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput2" class="form-label mb-3">Jumlah Stok</label>
                                            <input type="text" name="stok" class="form-control mb-3" style="height:40px;"
                                                id="formGroupExampleInput2" value="{{ $br->stok }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 button-action d-flex justify-content-between mt-0">
                            <button class="btn btn-primary berhasil" type="submit" style="width:20%;"><i
                                    class="ti-save me-2"></i>Simpan</button>
                            <button class="btn btn-danger" type="button" style="width:20%;" onClick="history.back()"><i
                                    class="fa-times-circle-o me-2"></i>Batal</button>
                        </div>
                    </form>
                @endforeach
                <!--End row-->
            </div>
        </div>
    </div>

@endsection
