@extends('layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid">
                <h2 class="title bold mb-5">Pelanggan</h2>
                <!--Button-->

                <!--Tabel Pelanggan-->
                <div class="table-responsive">
                    <table class="table table-hover border" id="table-datatables" width="100%" cellspacing="0">
                        <thead align="center">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No Hp Pelanggan</th>
                                <th>Hitung Pesanan</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            @foreach ($pelanggan as $p)
                                <?php $jumlah = DB::table('tb_keranjang')
                                    ->where('id_user', $p->id)
                                    ->where('status', 't')
                                    ->count(); ?>
                                <tr>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>{{ $p->no_hp }}</td>
                                    <td>{{ $jumlah }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Details-->
    <div class="modal fade" id="editpelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pelanggan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row mb-3">
                            <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" value="Jean">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputName" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" value="Jean@gmail.com">
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Bebas Pajak</legend>
                            <div class="col-sm-10 offset-sm-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="gridCheck1">
                                        Pengecualian pajak dinonaktifkan
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Email Marketing</legend>
                            <div class="col-sm-10 offset-sm-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="gridCheck1">
                                        Promo emails not allowed
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary me-4 berhasil">Simpan</button>
                        <button type="button" class="btn btn-danger close" data-dismiss="modal"
                            aria-label="Close">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
