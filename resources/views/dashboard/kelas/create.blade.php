@extends('dashboard.layouts.main')
@section('content')

<!-- START FORM -->
<form action='{{ url('dashboard/kelas')}}' method='post'>
    @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="pb-3">
                <a href='{{ url('dashboard/kelas') }}' class="btn btn-danger" > Kembali </a>
                </div>
            <div class="mt-3 mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Kelas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' value="{{ old('nama') }}" id="nama">
                </div>
            <div class="mt-3 mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-dark" name="submit">SIMPAN</button></div>
            </div>
          </form>
        </div>
        <!-- AKHIR FORM -->
        @endsection
