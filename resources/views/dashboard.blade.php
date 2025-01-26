@extends('layouts.template')
@section('judulh1','RB ACEH TAMIANG')

@section('konten') 
<div class="col-lg-12">
    <div class="card shadow-lg border-0">
        <div class="card-header text-white" style="background-color: #4CAF50;">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Judul Rumah BUMN -->
                <h3 class="card-title font-weight-bold">Selamat Datang di Rumah BUMN Aceh Tamiang</h3>
            </div>
        </div>
        <div class="card-body" style="background-color: #f1f9f4;">
            <h3 class="text-center font-weight-bold text-dark mb-4">Beberapa Pelatihan Yang Lakukan Di Rumah BUMN</h3>
            <!-- Daftar kegiatan dalam format teks -->
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Seduhan kopi bersama owner KopiKuRasa</li>
                <li class="list-group-item">Pembuatan gelang manik bersama owner Inovasi Cantik</li>
                <li class="list-group-item">Pembuatan gantungan kunci kain perca bersama owner Fashion Style</li>
                <li class="list-group-item">Pembuatan tas kain perca bersama owner Fashion Style</li>
                <li class="list-group-item">Rajut handmade bersama owner Sahada</li>
                <li class="list-group-item">Pembuatan gantungan kunci resin dan kain perca bersama owner Poligani</li>
            </ul>
        </div>
    </div>
</div>
@endsection

<style>
    /* Style untuk teks di dashboard */
    .list-group-item {
        font-size: 16px;
        font-weight: 500;
        background-color: #f9f9f9;
        border: none;
        padding: 10px 15px;
        margin-bottom: 5px;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .list-group-item:hover {
        background-color: #e8f5e9;
    }
</style>
