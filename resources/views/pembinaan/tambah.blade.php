@extends('layouts.template')
@section('judulh1','Admin - Pembinaan')
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
            <h3 class="card-title">Tambah Data Pembinaan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('pembinaan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class=" card-body">
                <div class="form-group">
                    
                    <label for="umkm_id">UMKM</label>
                    <select class="form-control" wire:model="umkm_id" name="umkm_id[]" >
                        <option hidden>--pilih UMKM</option>
                        @foreach ($umkm as $umkm)
                            <option value="{{ $umkm->id }}">{{ $umkm->pemilik }}</option>
                        @endforeach
                    </select>
                    
                </div>
                <div class="form-group">
                    <label for="kegiatan">Kegiatan</label>
                    <input type="text" class="form-control" id="kegiatan" name="kegiatan" >
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" >
                </div>
                <div class="form-group">
                    <label for="hasil_pembinaan">Hasil Pembinaan</label>
                    <input type="file" class="form-control" id="hasil_pembinaan" name="hasil_pembinaan" accept="image/*">
                </div>
                           
            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection