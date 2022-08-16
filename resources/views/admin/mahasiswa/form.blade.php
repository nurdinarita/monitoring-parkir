@extends('admin.layouts.main')

@section('container')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">{{ !isset($mahasiswa) ? 'Tambah Data Mahasiswa' : 'Edit Data Mahasiswa' }}</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">{{ !isset($mahasiswa) ? 'Tambah Data Mahasiswa' : 'Edit Data Mahasiswa' }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <form action="{{ !isset($mahasiswa) ? url('users/mahasiswa') : url('users/mahasiswa/'.$mahasiswa->id) }}" method="post">
                                @csrf
                                @if(isset($mahasiswa))
                                    @method('put')                                   
                                @endif
                                <div class="mb-2">
                                    <label for="uid">UID</label>
                                    <input type="text" class="form-control" id="uid" name="uid" placeholder="UID" value="{{ isset($mahasiswa) ? $mahasiswa->uid : old('uid') }}" required>
                                </div>
                                <div class="mb-2">
                                    <label for="nim">NIM</label>
                                    <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM" value="{{ isset($mahasiswa) ? $mahasiswa->nim : old('nim') }}" required>
                                </div>
                                <div class="mb-2">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{ isset($mahasiswa) ? $mahasiswa->nama : old('nama') }}" required>
                                </div>
                                <div class="mb-2">
                                    <label for="fakultas">Fakultas</label>
                                    <input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="Fakultas" value="{{ isset($mahasiswa) ? $mahasiswa->fakultas : old('fakultas') }}" required>
                                </div>
                                <div class="mb-2">
                                    <label for="jurusan">Jurusan</label>
                                    <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan" value="{{ isset($mahasiswa) ? $mahasiswa->jurusan : old('jurusan') }}" required>
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