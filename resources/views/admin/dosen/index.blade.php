@extends('admin.layouts.main')

@section('container')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Tabel Dosen</h4>
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
                <a href="#">Dosen</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data Dosen</h4>
                        <a class="btn btn-primary btn-round ml-auto" href="{{ url('users/dosen/create') }}">
                            <i class="fa fa-plus"></i>
                            Tambah Data
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>UID</th>
                                    <th>nip</th>
                                    <th>Nama</th>
                                    <th>Fakultas</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>UID</th>
                                    <th>nip</th>
                                    <th>Nama</th>
                                    <th>Fakultas</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($dosen as $dsn)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dsn->uid }}</td>
                                    <td>{{ $dsn->nip }}</td>
                                    <td>{{ $dsn->nama }}</td>
                                    <td>{{ $dsn->fakultas }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ url('users/dosen/'.$dsn->id.'/edit') }}" class="btn btn-link btn-primary btn-lg">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-link btn-danger" data-toggle="modal" data-target="#deleteModal" data-url="{{ url('users/dosen/'.$dsn->id) }}">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
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

<!-- Modal Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin Ingin Menghapus Data Ini?
            </div>
            <div class="modal-footer no-bd">
                <form method="post" id="form">
                    @csrf
                    @method('delete')
                    <button type="submit" id="" class="btn btn-danger">Ya Hapus</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script-hapus')
<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var url = button.data('url') // Extract info from data-* attributes
        
        var modal = $(this)
    
        modal.find('.modal-footer #form').attr("action", url)
    })
</script>
@endsection
