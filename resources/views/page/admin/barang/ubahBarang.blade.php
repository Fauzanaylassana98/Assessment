@extends('layouts.base_admin.base_dashboard')

@section('judul', 'Ubah Barang')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                        <li class="breadcrumb-item active">Ubah Barang</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @if(session('status'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                {{ session('status') }}
            </div>
        @endif

        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Informasi Barang</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="inputKodeBarang">Kode Barang</label>
                                        <input type="text" id="inputKodeBarang" name="KodeBarang"
                                               class="form-control @error('KodeBarang') is-invalid @enderror"
                                               placeholder="Masukkan kode barang"
                                               value="{{ $barang->KodeBarang }}" required="required" autocomplete="KodeBarang" readonly>
                                        @error('KodeBarang')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputNamaBarang">Nama Barang</label>
                                <input type="text" id="inputNamaBarang" name="NamaBarang"
                                       class="form-control @error('NamaBarang') is-invalid @enderror"
                                       placeholder="Masukkan nama barang"
                                       value="{{ $barang->NamaBarang }}" required="required" autocomplete="NamaBarang">
                                @error('NamaBarang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="inputSatuan">Satuan</label>
                                <input type="text" id="inputSatuan" name="Satuan"
                                    class="form-control @error('Satuan') is-invalid @enderror"
                                    placeholder="Masukkan satuan barang"
                                    value="{{ $barang->Satuan }}" required="required" autocomplete="Satuan">
                                @error('Satuan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="inputHargaSatuan">Harga Satuan</label>
                                <input type="number" id="inputHargaSatuan" name="HargaSatuan"
                                    class="form-control @error('HargaSatuan') is-invalid @enderror"
                                    placeholder="Masukkan harga satuan barang"
                                    value="{{ $barang->HargaSatuan }}" required="required" autocomplete="HargaSatuan">
                                @error('HargaSatuan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="inputStok">Stok</label>
                                <input type="number" id="inputStok" name="Stok"
                                    class="form-control @error('Stok') is-invalid @enderror"
                                    placeholder="Masukkan stok barang"
                                    value="{{ $barang->Stok }}" required="required" autocomplete="Stok">
                                @error('Stok')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <a href="javascript:history.back()" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Ubah Barang" class="btn btn-success float-right">
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection
