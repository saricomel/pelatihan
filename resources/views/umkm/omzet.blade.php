@extends('layouts.template')

@section('judulh1', 'Omzet UMKM - ' . $umkm->nama_usaha)

@section('konten')
<div class="col-md-12">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Data Omzet untuk UMKM: {{ $umkm->nama_usaha }}</h3>
            <a type="button" class="btn btn-success float-right" href="{{ route('omzet.create') }}">
                <i class="fas fa-plus"></i> Tambah Omzet
            </a>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Periode</th>
                        <th>Jumlah Omzet</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($omzet as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->priodi }}</td>
                        <td>{{ $data->jumlah_omzet }}</td>
                        <td>
                            <a href="{{ route('omzet.edit', $data->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
