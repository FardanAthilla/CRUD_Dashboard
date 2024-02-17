@extends('layouts.main')

@section('content')
<div class="container">
    <h1 class="mt-5">Tentang Saya</h1>
    <p class="mt-3 ">Nama: {{ $Nama }}</p>
    <p>Kelas: {{ $Kelas }}</p>
    <p>Foto:</p>
    <img src="{{ $Foto }}" alt="Gambar About Kami" class="img-thumbnail rounded-circle" width="200">
</div>
@endsection
