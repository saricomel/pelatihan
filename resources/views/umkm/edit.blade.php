@extends('layouts.template')
@section('judulh1','TAMPILAN EDIT UMKM')
@section('judulh3','Edit UMKM')
@section('konten')
<div class="col-md-6">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Ada yang salah.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit UMKM</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('umkm.update', $umkm->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_usaha">Nama Usaha</label>
                    <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" value="{{ old('nama_usaha', $umkm->nama_usaha) }}">
                </div>
                <div class="form-group">
                    <label for="pemilik">Pemilik</label>
                    <input type="text" class="form-control" id="pemilik" name="pemilik" value="{{ old('pemilik', $umkm->pemilik) }}">
                </div>
                <div class="form-group">
                    <label for="jenis_usaha">Jenis Usaha</label>
                    <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha" value="{{ old('jenis_usaha', $umkm->jenis_usaha) }}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" class="form-control" rows="4">{{ old('alamat', $umkm->alamat) }}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-warning float-right">Simpan</button>
            </div>
        </form>        
    </div>
</div>
@endsection
