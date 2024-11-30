@extends('layouts.template')
@section('judulh1','RB ACEH TAMIANG')

@section('konten') 
<div class="col-lg-12">
    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">Halaman Utama</h3>
            </div>
        </div>
        <div class="card-body" style="background-color: #6ae072;"> <!-- Warna latar belakang -->
            <h3>Halaman Dashboard</h3>
            <!-- Menampilkan dua gambar secara vertikal -->
            <div class="text-center">
                <img src="{{ asset('dist/img/bumn_3_-removebg-preview.png') }}" alt="Gambar 1" class="img-fluid" style="max-width: 50%; margin-bottom: 20px;">
            </div>
            <div class="text-center">
                <img src="{{ asset('dist/img/rumah.jpg') }}" alt="Gambar 2" class="img-fluid" style="max-width: 50%; margin-bottom: 20px;">
            </div>
        </div>
    </div>
</div>

@endsection
