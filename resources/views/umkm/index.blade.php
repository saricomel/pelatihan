@extends('layouts.template')

@section('judulh1', $title)

@section('konten')
    <div class="row">
        <!-- Kolom untuk UMKM -->
        <div class="col-md-12">
            <!-- Tombol untuk Menambah UMKM -->
            <a href="{{ route('umkm.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> <!-- Icon Tambah -->
                Tambah UMKM
            </a>
            
            
            <!-- Tabel UMKM -->
            <div class="card card-info">
                <div class="card-header">
                    <h2 class="card-title">Data UMKM</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Usaha</th>
                                <th>Pemilik</th>
                                <th>Jenis Usaha</th>
                                <th>Alamat</th>
                                <th>Aksi</th> <!-- Kolom Aksi untuk tombol Edit -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $umkmData as $dt)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dt->nama_usaha }}</td>
                                    <td>{{ $dt->pemilik }}</td>
                                    <td>{{ $dt->jenis_usaha }}</td>
                                    <td>{{ $dt->alamat }}</td>
                                    <td>
                                        <!-- Tombol Edit untuk UMKM -->
                                        <a href="{{ route('umkm.edit', $dt->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                         <!-- Tombol Hapus untuk UMKM -->
                                         <form action="{{ route('umkm.destroy', $dt->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus UMKM ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
        <!-- Kolom untuk Omzet -->
        <div class="col-md-12">
            <!-- Tombol untuk Menambah Omzet -->
            <a href="{{ route('omzet.create') }}" class="btn btn-success mb-3">
                <i class="fas fa-plus"></i> <!-- Icon Tambah -->
                Tambah Omzet
            </a>            
            
            <!-- Tabel Omzet -->
            <div class="card card-success">
                <div class="card-header">
                    <h2 class="card-title">Data Omzet</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>UMKM</th>
                                <th>Periode</th>
                                <th>Jumlah Omzet</th>
                                <th>Aksi</th> <!-- Kolom Aksi untuk tombol Edit -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($omzetData as $dt)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dt->umkm->pemilik }}</td>
                                    <td>{{ $dt->priodi }}</td>
                                    <td>{{ 'Rp ' . number_format($dt->jumlah_omzet, 0, ',', '.') }}</td>
                                    <td>
                                        <!-- Tombol Edit untuk Omzet -->
                                        <a href="{{ route('omzet.edit', $dt->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>                                        
                                        <!-- Tombol Hapus untuk Omzet -->
                                        <form action="{{ route('omzet.destroy', $dt->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Omzet ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
