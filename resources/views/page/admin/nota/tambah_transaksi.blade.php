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

            <div class="form-group">
                <label for="inputTglNota">Tanggal Nota</label>
                <input type="date" id="inputTglNota" name="TglNota" class="form-control @error('TglNota') is-invalid @enderror" value="{{ old('TglNota') }}" required>
                @error('TglNota')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputJamNota">Jam Nota</label>
                <input type="time" id="inputJamNota" name="JamNota" class="form-control @error('JamNota') is-invalid @enderror" value="{{ old('JamNota') }}" required>
                @error('JamNota')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputJumlahBelanja">Jumlah Belanja</label>
                <input type="number" step="0.01" id="inputJumlahBelanja" name="JumlahBelanja" class="form-control @error('JumlahBelanja') is-invalid @enderror" value="{{ old('JumlahBelanja') }}" required>
                @error('JumlahBelanja')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputDiskon">Diskon</label>
                <input type="number" step="0.01" id="inputDiskon" name="Diskon" class="form-control @error('Diskon') is-invalid @enderror" value="{{ old('Diskon') }}" required>
                @error('Diskon')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputTotal">Total</label>
                <input type="number" step="0.01" id="inputTotal" name="Total" class="form-control @error('Total') is-invalid @enderror" value="{{ old('Total') }}" required>
                @error('Total')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

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
