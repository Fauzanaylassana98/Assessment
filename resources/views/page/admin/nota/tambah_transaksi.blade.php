@extends('layouts.base_admin.base_dashboard')

@section('judul', 'Tambah Transaksi')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                        <li class="breadcrumb-item active">Tambah Transaksi</li>
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

        <form method="post" action="{{ route('nota.add') }}">
            @csrf

            <!-- Add your form fields for nota here -->
            <div class="form-group">
                <label for="inputKodeNota">Kode Nota</label>
                <input type="text" id="inputKodeNota" name="KodeNota" class="form-control @error('KodeNota') is-invalid @enderror" placeholder="Masukkan kode nota" value="{{ old('KodeNota') }}" required autocomplete="KodeNota">
                @error('KodeNota')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Pilihan Tenan -->
            <div class="form-group">
                <label for="inputKodeTenan">Pilih Tenan</label>
                <select id="inputKodeTenan" name="KodeTenan" class="form-control @error('KodeTenan') is-invalid @enderror" required>
                    <option value="">Pilih Tenan</option>
                    @foreach($tenans as $tenan)
                        <option value="{{ $tenan->KodeTenan }}" {{ old('KodeTenan') == $tenan->KodeTenan ? 'selected' : '' }}>{{ $tenan->NamaTenan }}</option>
                    @endforeach
                </select>
                @error('KodeTenan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Pilihan Kasir -->
            <div class="form-group">
                <label for="inputKodeKasir">Pilih Kasir</label>
                <select id="inputKodeKasir" name="KodeKasir" class="form-control @error('KodeKasir') is-invalid @enderror" required>
                    <option value="">Pilih Kasir</option>
                    @foreach($kasirs as $kasir)
                        <option value="{{ $kasir->KodeKasir }}" {{ old('KodeKasir') == $kasir->KodeKasir ? 'selected' : '' }}>{{ $kasir->Nama }}</option>
                    @endforeach
                </select>
                @error('KodeKasir')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Add your other form fields for nota here -->

            <div class="row">
                <div class="col-12">
                    <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Tambah Transaksi" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection

@section('script_footer')
    <!-- Additional scripts, if any -->
@endsection
