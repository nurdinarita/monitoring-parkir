@extends('admin.layouts.main')

@section('container')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Tabel Riwayat Keluar</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Tables</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">History</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Riwayat Keluar</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>UID</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Tanggal & Waktu</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>UID</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Tanggal & Waktu</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($keluar as $klr)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $klr->uid }}</td>
                                    <td>{{ $klr->nama }}</td>
                                    <td>{{ $klr->status }}</td>
                                    <td>{{ $klr->created_at->format('d-M-Y, h:i:s') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection