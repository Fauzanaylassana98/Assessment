@extends('layouts.base_admin.base_dashboard')

@section('judul', 'Tambah Rating')

@section('script_head')
    <!-- Add your existing script_head content here -->

    <!-- Add the Star Rating Plugin CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" integrity="sha256-/qKws7c+s6/tQ+C+1/CVTMstAqSwqakMmyHY9AAAsXI=" crossorigin="anonymous" />

    <!-- Add the Star Rating Plugin JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js" integrity="sha256-fy/CXPMbNQXayr93gUnw4QK2jyHzwfpd0fE0qZnRCug=" crossorigin="anonymous"></script>
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Rating</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                        <li class="breadcrumb-item active">Tambah Rating</li>
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

        <form method="post" action="{{ route('history_rating.add') }}">
            @csrf

            <!-- Add your form fields for rating here -->

            <div class="form-group">
                <label for="inputNilaiRating">Nilai Rating</label>
                <input id="inputNilaiRating" name="nilai_rating" type="number" class="form-control d-none" required="required" min="1" max="5">
                <div id="starRating" class="rating"></div>

                @error('nilai_rating')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputUlasan">Ulasan</label>
                <textarea id="inputUlasan" name="ulasan" class="form-control @error('ulasan') is-invalid @enderror" placeholder="Masukkan ulasan" required="required">{{ old('ulasan') }}</textarea>
                @error('ulasan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row">
                <div class="col-12">
                    <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Tambah Rating" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection

@section('script_footer')
        <script>
            // Initialize the Star Rating Plugin
            $(document).ready(function() {
                $('#starRating').rating({
                    min: 1,
                    max: 5,
                    step: 1,
                    size: 'lg',
                    starCaptions: function(val) {
                        return val;
                    },
                    starCaptionClasses: function(val) {
                        return 'badge badge-info';
                    }
                });
                
                // Update the hidden input when the rating changes
                $('#starRating').on('rating:change', function(event, value, caption) {
                    $('#inputNilaiRating').val(value);
                });
            });
        </script>
    @endsection
