@extends('layouts.template')
@section('judulh1','RB ACEH TAMIANG')

@section('konten') 
<div class="col-lg-12">
    <div class="card shadow-lg border-0">
        <div class="card-header text-white" style="background-color: #4CAF50;">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Logo Rumah BUMN -->
                <div class="d-flex align-items-center">
                    <img src="{{ asset('dist/img/bumn_3_-removebg-preview.png') }}" alt="Logo Rumah BUMN" class="img-fluid logo-rb" style="width: 100px; height: auto; margin-right: 20px;">
                    <h3 class="card-title font-weight-bold">Selamat Datang di Rumah BUMN Aceh Tamiang</h3>
                </div>
            </div>
        </div>
        <div class="card-body" style="background-color: #f1f9f4;">
            <!-- Gambar Kantor Rumah BUMN -->
            <div class="text-center mb-4">
                <img src="{{ asset('dist/img/rumah.jpg') }}" alt="Kantor Rumah BUMN" class="img-fluid rounded shadow-lg" style="max-width: 30%; height: auto; border-radius: 10px;">
            </div>
            <h3 class="text-center font-weight-bold text-dark mb-4">Beberapa Dokumentasi Pelatihan Di Rumah BUMN</h3>
            <!-- Grid untuk Gambar -->
            <div class="row">
                <!-- Gambar 1 -->
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <img src="{{ asset('dist/img/kop.jpg') }}" alt="Bazar 1" class="card-img-top img-fluid rounded shadow-lg" style="height: 300px; object-fit: cover;">
                        <div class="card-body text-center">
                            <p class="card-text">Seduhan kopi bersama owner kopikurasa</p>
                        </div>
                    </div>
                </div>
                <!-- Gambar 2 -->
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <img src="{{ asset('dist/img/gelang.jpg') }}" alt="Bazar 2" class="card-img-top img-fluid rounded shadow-lg" style="height: 300px; object-fit: cover;">
                        <div class="card-body text-center">
                            <p class="card-text">Gelang Manik" bersama owner inovasi cantik</p>
                        </div>
                    </div>
                </div>
                <!-- Gambar 3 -->
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <img src="{{ asset('dist/img/ganci.jpg') }}" alt="Bazar 3" class="card-img-top img-fluid rounded shadow-lg" style="height: 300px; object-fit: cover;">
                        <div class="card-body text-center">
                            <p class="card-text">Ganci kain perca bersama owner fashion style</p>
                        </div>
                    </div>
                </div>
                <!-- Gambar 4 -->
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <img src="{{ asset('dist/img/jahit.jpg') }}" alt="Bazar 4" class="card-img-top img-fluid rounded shadow-lg" style="height: 300px; object-fit: cover;">
                        <div class="card-body text-center">
                            <p class="card-text">tas kain perca bersama owner fashion style</p>
                        </div>
                    </div>
                </div>
                <!-- Gambar 5 -->
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <img src="{{ asset('dist/img/rajut.jpg') }}" alt="Bazar 5" class="card-img-top img-fluid rounded shadow-lg" style="height: 300px; object-fit: cover;">
                        <div class="card-body text-center">
                            <p class="card-text">Rajut homade bersama owner sahada</p>
                        </div>
                    </div>
                </div>
                <!-- Gambar 6 -->
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <img src="{{ asset('dist/img/res.jpg') }}" alt="Bazar 6" class="card-img-top img-fluid rounded shadow-lg" style="height: 300px; object-fit: cover;">
                        <div class="card-body text-center">
                            <p class="card-text">ganci resin dan kain perca bersama owner poligani</p>
                        </div>
                    </div>
                </div>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<style>
    /* Style untuk logo Rumah BUMN */
    .logo-rb {
        border-radius: 50%; /* Membuat logo menjadi bulat */
        box-shadow: 0 8px 15px rgba(0,0,0,0.2); /* Memberikan bayangan lebih dramatis */
        transition: all 0.3s ease-in-out; /* Transisi animasi */
    }

    /* Efek hover untuk logo */
    .logo-rb:hover {
        transform: scale(1.1); /* Memperbesar logo saat hover */
        box-shadow: 0 12px 20px rgba(0,0,0,0.3); /* Menambah bayangan saat hover */
    }
</style>
