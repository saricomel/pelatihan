@extends('layouts.template')
@section('judulh1','Admin - omzet')

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
            <h3 class="card-title">Ubah Data omzet</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('omzet.update', $omzet->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="priodi">priodi</label>
                    <input type="date" class="form-control" id="priodi" name="priodi" value="{{ $omzet->priodi }}">
                </div>
                <div class="form-group">
                    <label for="jumlah_omzet">Jumlah Omzet</label>
                    <input type="numeric" class="form-control" id="jumlah_omzet" name="jumlah_omzet" value="{{ $omzet->jumlah_omzet }}">
                </div>
            </div>
      
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-warning float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
