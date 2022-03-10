@extends('layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container-fluid">
                <h2 class="title bold mb-5">Toko</h2>
                <!--Button-->

                <!--Tabel Pelanggan-->
                <div class="button d-sm-flex justify-content-left align-content-center mb-4">
                    <a data-toggle="modal" data-target="#tambah" class="btn btn-primary btn-icon-split btn-sm">
                        <span class="icon text-white">
                            <i class="ti-plus"></i>
                        </span>
                    </a>
                </div>
                <div class="table-responsive" style="overflow-x:auto;">
                    <table class="table table-hover border" id="table-datatables" width="100%" cellspacing="0">
                        <thead align="center">
                            <tr>
                                <th>No</th>
                                <th>Nama Bank</th>
                                <th>No Rekening</th>
                                <th>Atas Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            <?php
                            
                            use Illuminate\Support\Facades\DB;
                            
                            $no = 1;
                            ?>
                            @foreach ($bank as $b)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $b->nama_bank }}</td>
                                    <td>{{ $b->no_rek }}</td>
                                    <td>{{ $b->atas_nama }}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#edit{{ $b->id_bank }}"
                                            class="btn btn-primary btn-icon-split btn-sm">
                                            <span class="icon text-white">
                                                <i class="ti-pencil"></i>
                                            </span>
                                        </a>
                                        <a href="{{ url('proses_hapus_bank', $b->id_bank) }}"
                                            onclick="return confirm('Yakin Akan Menghapus Data Ini ?')"
                                            class="btn btn-primary btn-icon-split btn-sm">
                                            <span class="icon text-white">
                                                <i class="ti-trash"></i>
                                            </span>
                                        </a>
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
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Bank</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-5" style="overflow-x:auto;">
                    <div class="row g-3">
                        <form action="{{ url('proses_tambah_bank') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Nama Bank</label>
                                <input type="text" class="form-control" name="nama_bank" required>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Atas Nama</label>
                                <input type="text" class="form-control" name="atas_nama" required>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">No Rekening</label>
                                <input type="text" class="form-control" name="no_rek" required>
                            </div>
                            <div class="button d-sm-flex justify-content-center align-content-center mb-4">
                                <button type="submit" class="btn btn-primary btn-icon-split btn-sm">
                                    <span class="icon text-white">
                                        <i class="ti-save"></i>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($bank as $b)
        <div class="modal fade" id="edit{{ $b->id_bank }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Bank</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-5" style="overflow-x:auto;">
                        <div class="row g-3">
                            <?php
                            $edit_bank = DB::table('tb_bank')
                                ->where('id_bank', $b->id_bank)
                                ->get();
                            ?>
                            @foreach ($edit_bank as $eb)
                                <form action="{{ url('proses_edit_bank', $eb->id_bank) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-sm-12 mb-3">
                                        <label class="form-label">Nama Bank</label>
                                        <input type="text" class="form-control" name="nama_bank"
                                            value="{{ $eb->nama_bank }}" required>
                                    </div>
                                    <div class="col-sm-12 mb-3">
                                        <label class="form-label">Atas Nama</label>
                                        <input type="text" class="form-control" name="atas_nama"
                                            value="{{ $eb->atas_nama }}" required>
                                    </div>
                                    <div class="col-sm-12 mb-3">
                                        <label class="form-label">No Rekening</label>
                                        <input type="text" class="form-control" name="no_rek" value="{{ $eb->no_rek }}"
                                            required>
                                    </div>
                                    <div class="button d-sm-flex justify-content-center align-content-center mb-4">
                                        <button type="submit" class="btn btn-primary btn-icon-split btn-sm">
                                            <span class="icon text-white">
                                                <i class="ti-save"></i>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
