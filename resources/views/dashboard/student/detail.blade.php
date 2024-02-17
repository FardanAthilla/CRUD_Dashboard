@extends('dashboard.layouts.main')

@section('content')
<div class="container p-4">
    <div class="pb-3">
        <a href='{{ url('dashboard/student') }}' class="btn btn-danger"> Kembali </a> 
    </div>
    <h1 class="display-4 mb-4">Detail Student</h1>

    <div class="form-group py-2">
        <label for="nis">NIS</label>
        <input type="text" id="nis" name="nis" value="{{ $student->nis }}" class="form-control" readonly>
    </div>

    <div class="form-group py-2">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" value="{{ $student->nama }}" class="form-control" readonly>
    </div>

    <div class="form-group py-2">
        <label for="kelas">Kelas</label>
        <input type="text" id="kelas" name="kelas" value="{{ $student->kelas->nama }}" class="form-control" readonly>
    </div>

    <div class="form-group py-2">
        <label for="tgl_lahir">Tanggal Lahir</label>
        <input type="text" id="tgl_lahir" name="tgl_lahir" value="{{ $student->tgl_lahir }}" class="form-control" readonly>
    </div>

    <div class="form-group py-2">
        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" name="alamat" value="{{ $student->alamat }}" class="form-control" readonly>
    </div>
</div>
@endsection
