@extends('dashboard.layouts.main')

@section('content')
<div class="container mt-5">
    <div class="jumbotron">
        <h1 class="display-4">Selamat Datang, {{ auth()->user()->name }}</h1>
        <p class="lead">Ini adalah halaman dasbor Anda. Selamat mengeksplorasi!</p>
        <hr class="my-4">
        <p>Anda dapat menambahkan konten atau fitur lainnya sesuai kebutuhan.</p>
    </div>
</div>
@endsection
