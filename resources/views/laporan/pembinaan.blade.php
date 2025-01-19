@extends('layouts.template')

@section('tambahanCSS')
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@endsection

@section('judulh1', 'Laporan Pembinaan Bulanan')

@section('konten')
<div class="col-md-12">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Laporan Pembinaan Bulanan</h3>
        </div>
        <div class="card-body">
            <!-- Filter Form -->
            <form method="GET" action="{{ route('pembinaan.laporan') }}" class="mb-4">
                <div class="row">
                    <div class="col-md-4">
                        <label for="bulan" class="form-label">Bulan</label>
                        <select name="bulan" id="bulan" class="form-control">
                            <option value="">Pilih Bulan</option>
                            @foreach(range(1, 12) as $month)
                            <option value="{{ $month }}" {{ request('bulan') == $month ? 'selected' : '' }}>
                                {{ DateTime::createFromFormat('!m', $month)->format('F') }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="tahun" class="form-label">Tahun</label>
                        <select name="tahun" id="tahun" class="form-control">
                            <option value="">Pilih Tahun</option>
                            @foreach(range(date('Y') - 5, date('Y')) as $year)
                            <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Filter</button>
                </div>
            </form>

            <!-- Tabel Kegiatan Bulanan -->
            <h4>Kegiatan Pembinaan Bulanan</h4>
            @if($pembinaan->isEmpty())
            <p class="text-danger">Tidak ada data kegiatan pembinaan untuk bulan dan tahun yang dipilih.</p>
            @else
            <table id="pembinaanTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Hasil Pembinaan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pembinaan as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->kegiatan }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</td>
                        <td>{{ $item->hasil_pembinaan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection

@section('tambahanJS')
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(function() {
        $('#pembinaanTable').DataTable({
            responsive: true,
            autoWidth: false,
        });
    });
</script>
@endsection
