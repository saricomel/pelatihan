@extends('layouts.template')
@section('tambahanCSS')
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Toastr -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<!-- Tambahkan CSS khusus untuk halaman ini -->
<style>
    .foto-hasil-pembinaan {
        width: 100px; /* Lebar gambar */
        height: 100px; /* Tinggi gambar */
        object-fit: cover; /* Agar gambar tetap proporsional */
        border-radius: 5px; /* Sudut melengkung */
        border: 1px solid #ddd; /* Garis tepi */
    }
</style>
@endsection
@section('judulh1','Admin - Pembinaan UMKM')
@section('konten')
<div class="col-md-12">
    <div class="card card-info">
        <div class="card-header">
            <h2 class="card-title">Data Pembinaan UMKM</h2>
            <a type="button" class="btn btn-success float-right" href="{{ route('pembinaan.create') }}">
                <i class="fas fa-plus"></i> Tambah Pembinaan
            </a>
    
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Hasil Pembinaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $dt)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->kegiatan }}</td>
                        <td>{{ $dt->tanggal }}</td>
                        <td>
                            @if($dt->hasil_pembinaan)
                                <img src="{{ asset('hasil_pembinaan/' . $dt->hasil_pembinaan) }}" alt="Hasil Pembinaan" width="100">
                            @else
                                Tidak ada foto
                            @endif
                        </td>                        
                        <td>

                            <div class="btn-group">
                                <form action="{{ route('pembinaan.destroy', $dt->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Pembinaan ini?');" style="width: 70px;">
                                        <i class="fas fa-trash fa-lg"></i>
                                    </button>
                                </form>
                                <a class="btn btn-sm btn-warning" href="{{ route('pembinaan.edit', $dt->id) }}" style="width: 70px;">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                            
                            </div>
                            
                            </div>

                            
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('tambahanJS')
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endsection
@section('tambahScript')
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
@if($message = Session::get('success'))
toastr.success("{{ $message }}");
@endif
@if($message = Session::get('updated'))
toastr.warning("{{ $message }}");
@endif
</script>
@endsection
