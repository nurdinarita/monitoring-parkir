@extends('admin.layouts.main')

@section('container')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">{{ !isset($dosen) ? 'Tambah Data Dosen' : 'Edit Data Dosen' }}</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">{{ !isset($dosen) ? 'Tambah Data Dosen' : 'Edit Data Dosen' }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <form action="{{ !isset($dosen) ? url('users/dosen') : url('users/dosen/'.$dosen->id) }}" method="post">
                                @csrf
                                @if(isset($dosen))
                                    @method('put')                                   
                                @endif
                                <div class="mb-2">
                                    <label for="uid">UID</label>
                                    <input type="text" class="form-control" id="uid" name="uid" placeholder="UID" value="{{ isset($dosen) ? $dosen->uid : old('uid') }}" required>
                                </div>
                                <div class="mb-2">
                                    <label for="nim">NIP</label>
                                    <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" value="{{ isset($dosen) ? $dosen->nip : old('nip') }}" required>
                                </div>
                                <div class="mb-2">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{ isset($dosen) ? $dosen->nama : old('nama') }}" required>
                                </div>
                                <div class="mb-2">
                                    <label for="fakultas">Fakultas</label>
                                    <input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="Fakultas" value="{{ isset($dosen) ? $dosen->fakultas : old('fakultas') }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection