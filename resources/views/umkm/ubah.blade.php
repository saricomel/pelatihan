@extends('layouts.template')

@section('judulh1', $title)

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
            <h3 class="card-title">Edit Omzet</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('omzet.update', $omzet->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="umkm">UMKM</label>
                    <input type="text" class="form-control" id="umkm" name="umkm" value="{{ $omzet->umkm->pemilik }}" disabled>
                </div>
                <div class="form-group">
                    <label for="priodi">Periode</label>
                    <input type="text" class="form-control" id="priodi" name="priodi" value="{{ $omzet->priodi }}">
                </div>
                <div class="form-group">
                    <label for="jumlah_omzet">Jumlah Omzet</label>
                    <input type="number" class="form-control" id="jumlah_omzet" name="jumlah_omzet" value="{{ $omzet->jumlah_omzet }}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-warning float-right">Simpan</button>
            </div>
        </form>        
    </div>
</div>
@endsection
