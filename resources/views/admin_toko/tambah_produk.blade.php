@extends('admin_toko.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="header-wrapper mb-4 ">
                <a class="tinggal" href="{{ url('produk_user') }}"><i class="icon-arrow-left me-2"></i>Kembali</a>
            </div>
            <div class="container-fluid">
                <h2 class="produk-title">Produk Baru</h2>
                <!--Button-->
                <form action="{{ url('proses_tambah_user') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row d-flex">
                        <div class="col-8">
                            <div class="image-list card mb-4">
                                <div class="card-body d-flex justify-content-around">
                                    <input type="file" name="foto" id="file">
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
                        <div class="col-4">
                            <div class="form-input card mb-4">
                                <div class="card-body">
                                    <label for="formGroupExampleInput" class="label-pricing">Pricing</label>
                                    <div class="mb-3 d-flex">
                                        <span class="input-group-text" style="height:50px;">Rp</span>
                                        <input type="text" name="harga" class="form-control" style="height:50px"
                                            placeholder="0">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput2" class="label-harga">Harga Satuan</label>
                                        <input type="text" name="satuan" class="form-control mb-3" style="height:40px;"
                                            id="formGroupExampleInput2" placeholder="ons">
                                        <input type="text" name="harga_satuan" class="form-control mb-3"
                                            style="height:40px;" id="formGroupExampleInput2" placeholder="400">
                                    </div>
                                    {{-- <label for="formGroupExampleInput2" class="label-harga"data-bs-toggle="tooltip" data-bs-placement="top" title="">Harga Promo</label>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Price per item</th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">
                                <input type="text" class="form-control mb-3" id="formGroupExampleInput2" placeholder="">
                                <span>s.d</span>
                                <input type="text" class="form-control mb-3 mt-3" id="formGroupExampleInput2" placeholder=""></th>
                                <td><input type="text" class="form-control mb-3" id="formGroupExampleInput2" placeholder=""></td>
                                <td><div class="button d-sm-flex justify-content-center align-items-ends">
                                    <button type="submit" class="btn btn-danger btn-icon-split p-2 hapus">
                                        <span class="icon text-white">
                                            <i class="ti-trash"></i>
                                        </span>
                                    </button>
                                </div></td>
                              </tr>
                            </tbody>
                          </table>
                          <button type="submit" class="btn btn-primary btn-icon-split ">
                            <span class="icon text-white">
                                <i class="ti-plus me-2"></i>Tambah
                            </span>
                        </button> --}}
                                </div>
                            </div>
                            <div class="form-input card mb-4">
                                <div class="card-body">
                                    <label for="formGroupExampleInput" class="form-label">Product availablity</label>
                                    <div class="select mb-4">
                                        <select name="status" class="form-select form-select-sm"
                                            aria-label=".form-select-sm example">
                                            <option selected disabled>--Pilih Ketersediaan--</option>
                                            <option value="Tampilkan">Tampilkan</option>
                                            <option value="Sembunyikan">Sembunyikan</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput2" class="form-label mb-3">Jumlah Stok</label>
                                        <input type="text" name="stok" class="form-control mb-3" style="height:40px;"
                                            id="formGroupExampleInput2" placeholder="">

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
                <!--End row-->
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        document.querySelector(".berhasil").addEventListener('click', function() {
            Swal.fire("Data Berhasil Tersimpan", "Klik ok untuk menutup pop up!", "success");
        });
    </script>

    {{-- <script>
  const image_input = document.querySelector('#file');
  var uploaded_image = "";

  image_input.addEventListener("change"), function(){
    console.log(image_input.value);
    const reader = new FileReader(); 
    reader.addEventListener("load", () => {
      uploaded_image = reader.result;
      document.querySelector("#d_foto").style.backgroundImage = 'url(${uploaded_image})'
    });
    reader.readAsDataURL(this.files[0]);
  };
</script> --}}
@endsection
