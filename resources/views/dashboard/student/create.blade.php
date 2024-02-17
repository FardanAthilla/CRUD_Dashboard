@extends('dashboard.layouts.main')

@section('content')

<form action='{{ url('dashboard/student')}}' method='post'>
    @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="pb-3">
                <a href='{{ url('dashboard/student') }}' class="btn btn-danger" > Kembali </a>
                </div>
            <div class="mb-3 row">
                <label for="nis" class="col-sm-2 col-form-label">Nis</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='nis' value="{{ old('nis') }}" id="nis">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Murid</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' value="{{ old('nama') }}" id="nama">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                <div class="col-sm-10">
                    {{-- <input type="text" class="form-control" name='kelas' value="{{ old('kelas') }}" id="kelas"> --}}
                    <select class="form-select" name="kelas_id" id="kelas_id">
                        <option selected></option>
                    @foreach ($kelas as $item)
                        <option name="kelas_id" value="{{ $item->id }}"> {{$item->nama }}</option>
                    @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='alamat' value="{{ old('alamat') }}" id="alamat">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='tgl_lahir' value="{{ old('tgl_lahir') }}" id="tgl_lahir">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-dark" name="submit">SIMPAN</button></div>
            </div>
          </form>
        </div>
        @endsection
