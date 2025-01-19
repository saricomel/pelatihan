@extends('layouts.template')
@section('judulh1','Admin - Omzet')

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
            <h3 class="card-title">Tambah Data omzet</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('omzet.store') }}" method="POST">
            @csrf

            <div class=" card-body">
                <div class="form-group">
                    <label for="umkm_id">UMKM</label>
                    <select class="form-control" wire:model="umkm_id" name="umkm_id" >
                        <option hidden>--pilih produk</option>
                        @foreach ($umkm as $dt)
                            <option value="{{ $dt->id }}">{{ $dt->pemilik }}</option>
                        @endforeach
                    </select>
                <!-- Input untuk omzet -->
                <div class="form-group">
                    <label for="priodi">priodi</label>
                    <input type="date" class="form-control" id="priodi" name="priodi" placeholder="Contoh: Januari 2024">
                </div>
                <div class="form-group">
                    <label for="jumlah_omzet">Jumlah Omzet</label>
                    <input type="numeric" class="form-control" id="jumlah_omzet" name="jumlah_omzet" placeholder="Jumlah Omzet">
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
