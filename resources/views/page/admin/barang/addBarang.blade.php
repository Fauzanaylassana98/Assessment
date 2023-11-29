@extends('layouts.base_admin.base_dashboard')

@section('judul', 'Tambah Barang')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                        <li class="breadcrumb-item active">Tambah Barang</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="post" action="{{ route('barang.add') }}">
            @csrf

            <!-- Add your form fields for barang here -->
            <div class="form-group">
                <label for="inputKodeBarang">Kode Barang</label>
                <input type="text" id="inputKodeBarang" name="KodeBarang" class="form-control @error('KodeBarang') is-invalid @enderror" placeholder="Masukkan kode barang" value="{{ old('KodeBarang') }}" required="required" autocomplete="KodeBarang">
                @error('KodeBarang')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputNamaBarang">Nama Barang</label>
                <input type="text" id="inputNamaBarang" name="NamaBarang" class="form-control @error('NamaBarang') is-invalid @enderror" placeholder="Masukkan nama barang" value="{{ old('NamaBarang') }}" required="required" autocomplete="NamaBarang">
                @error('NamaBarang')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputSatuan">Satuan</label>
                <input type="text" id="inputSatuan" name="Satuan" class="form-control @error('Satuan') is-invalid @enderror" placeholder="Masukkan satuan barang" value="{{ old('Satuan') }}" required="required" autocomplete="Satuan">
                @error('Satuan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputHargaSatuan">Harga Satuan</label>
                <input type="number" step="0.01" id="inputHargaSatuan" name="HargaSatuan" class="form-control @error('HargaSatuan') is-invalid @enderror" placeholder="Masukkan harga satuan" value="{{ old('HargaSatuan') }}" required="required" autocomplete="HargaSatuan">
                @error('HargaSatuan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputStok">Stok</label>
                <input type="number" id="inputStok" name="Stok" class="form-control @error('Stok') is-invalid @enderror" placeholder="Masukkan stok barang" value="{{ old('Stok') }}" required="required" autocomplete="Stok">
                @error('Stok')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row">
                <div class="col-12">
                    <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Tambah Barang" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection

@section('script_footer')
    <!-- Additional scripts, if any -->
@endsection
