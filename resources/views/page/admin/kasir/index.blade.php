@extends('layouts.base_admin.base_dashboard')

@section('judul', 'List Kasir')

@section('script_head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Kasir</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active">Kasir</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0" style="margin: 20px">
            <table id="previewKasir" class="table table-striped table-bordered display" style="width:100%">
                <thead>
                    <tr>
                        <th>Kode Kasir</th>
                        <th>Nama</th>
                        <th>HP</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
@endsection

@section('script_footer')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#previewKasir').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('kasir.index') }}",
            columns: [
                { data: 'KodeKasir', name: 'KodeKasir' },
                { data: 'Nama', name: 'Nama' },
                { data: 'HP', name: 'HP' },
            ],
            language: {
                decimal: "",
                emptyTable: "Tak ada data yang tersedia pada tabel ini",
                info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
                infoEmpty: "Menampilkan 0 hingga 0 dari 0 entri",
                infoFiltered: "(difilter dari _MAX_ total entri)",
                infoPostFix: "",
                thousands: ",",
                lengthMenu: "Tampilkan _MENU_ entri",
                loadingRecords: "Loading...",
                processing: "Sedang Mengambil Data...",
                search: "Pencarian:",
                zeroRecords: "Tidak ada data yang cocok ditemukan",
                paginate: {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                }, 
                aria: {
                    "sortAscending": ": aktifkan untuk mengurutkan kolom ascending",
                    "sortDescending": ": aktifkan untuk mengurutkan kolom descending"
                }
            }
        });
    });
</script>
@endsection
