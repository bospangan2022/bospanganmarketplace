@extends('layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid">
                <h2 class="title bold mb-5">Toko</h2>
                <!--Button-->

                <!--Tabel Pelanggan-->
                <div class="table-responsive" style="overflow-x:auto;">
                    <table class="table table-hover border" id="table-datatables" width="100%" cellspacing="0">
                        <thead align="center">
                            <tr>
                                <th>Nama Pengguna</th>
                                <th>Nama Toko</th>
                                <th>Nomer Hp Toko</th>
                                <th>Status</th>
                                <th>Aktif</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            @foreach ($toko as $t)
                                <tr>
                                    <td>{{ $t->name }}</td>
                                    <td>{{ $t->nama_toko }}</td>
                                    <td>{{ $t->hp_toko }}</td>
                                    <?php if ($t->status == 'ts') {
                                        echo '<td >Tidak Setuju</td>';
                                    } else {
                                        echo '<td >Setujui</td>';
                                    } ?>
                                    <td>
                                        <div class="button d-sm-flex justify-content-center align-content-center mb-4">
                                            <a data-toggle="modal" data-target="#detail{{ $t->id_toko }}"
                                                class="btn btn-primary btn-icon-split btn-sm">
                                                <span class="icon text-white">
                                                    <i class="ti-eye"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Details-->
    @foreach ($toko as $t)
        <div class="modal fade" id="detail{{ $t->id_toko }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Toko</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-5" style="overflow-x:auto;">
                        <div class="row g-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="" alt="">
                                </div>
                                <div class="col-md-6">
                                    <form action="{{ url('update_status', $t->id_toko) }}">
                                        <div class="col-sm-12 mb-3 d-flex status-toko">
                                            <h3>Status Toko :</h3>
                                            <?php if ($t->status == "ts") { ?>
                                            <h3 class="text-danger">Belum Disetujui</h3>
                                            <?php } else { ?>
                                            <h3 class="text-success">Disetujui</h3>
                                            <?php } ?>
                                            <button type="submit" class="btn btn-success btn-sm p-2 ms-2">Ubah</button>
                                        </div>
                                    </form>
                                    <div class="col-sm-10 mb-3">
                                        <label class="form-label">Nama Pengguna</label>
                                        <input type="text" class="form-control" value="{{ $t->name }}" readonly>
                                    </div>
                                    <div class="col-sm-10 mb-3">
                                        <label class="form-label">Nama Toko</label>
                                        <input type="text" class="form-control" value="{{ $t->nama_toko }}" readonly>
                                    </div>
                                    <div class="col-sm-10 mb-3">
                                        <label class="form-label">Nomer Hp Toko</label>
                                        <input type="text" class="form-control" value="{{ $t->no_hp }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Alamat Toko</label>
                                <textarea type="text" class="form-control" style="height: 100px"
                                    readonly>{{ $t->alamat }}, {{ $t->nama_desa }}, {{ $t->nama_kecamatan }}, {{ $t->nama_kota }} {{ $t->kode_pos }}</textarea>
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Deskripsi Toko</label>
                                <textarea type="text" class="form-control" style="height: 100px"
                                    readonly>{{ $t->deskripsi }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
