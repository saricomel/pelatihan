@extends('layouts.template')
@section('judulh1','Admin - UMKM')
@section('konten')
<div class="col-md-6">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Tambah Data UMKM</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('umkm.store') }}" method="POST">
            @csrf
            <div class=" card-body">
                <div class="form-group">
                    <label for="nama_usaha">Nama Usaha</label>
                    <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" placeholder="Nama Usaha">
                </div>
                <div class="form-group">
                    <label for="pemilik">Pemilik</label>
                    <input type="text" class="form-control" id="pemilik" name="pemilik" placeholder="Nama Pemilik">
                </div>
                <div class="form-group">
                    <label for="jenis_usaha">Jenis Usaha</label>
                    <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha"
                        placeholder="Jenis Usaha">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" class=" form-control" rows="4"
                        placeholder="Alamat Usaha"></textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection