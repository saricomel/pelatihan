@extends('layouts.template')
@section('judulh1','Edit - Pembinaan')

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

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Ubah Data Pembinaan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('pembinaan.update', $pembinaan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="kegiatan">Kegiatan</label>
                    <input type="text" class="form-control" id="kegiatan" name="kegiatan" value="{{ $pembinaan->kegiatan }}">
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $pembinaan->tanggal }}">
                </div>
                <label for="hasil_pembinaan">Hasil Pembinaan</label>
                <input type="file" class="form-control" id="hasil_pembinaan" name="hasil_pembinaan" accept="image/*">
                @if($pembinaan->hasil_pembinaan)
                    <img src="{{ asset('hasil_pembinaan/' . $pembinaan->hasil_pembinaan) }}" alt="Hasil Pembinaan" width="100">
                @endif
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-warning float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
