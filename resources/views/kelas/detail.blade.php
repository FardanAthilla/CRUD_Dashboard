@extends('layouts.main')

@section('content')
<div class="container p-4">
    <div class="pb-3">
        <a href='{{ url('kelas') }}' class="btn btn-danger"> Kembali </a> 
    </div>
    <h1 class="display-4 mb-4">Detail Kelas</h1>
    <div class="form-group py-2">
        <label for="nama">Nama Kelas</label>
        <input type="text" id="nama" name="nama" value="{{ $kelas->nama }}" class="form-control" readonly>
    </div>
</div>
@endsection
