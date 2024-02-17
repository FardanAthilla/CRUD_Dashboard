@extends('dashboard.layouts.main')

@section('content')

<!-- START FORM -->
<form action='/dashboard/student/{{ $item->id }}' method='post'> 
    @csrf
    @method('put')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="pb-3">
            <a href='{{ url('dashboard/student') }}' class="btn btn-danger"> Kembali </a> 
        </div>
        <div class="mb-3 row">
            <label for="nis" class="col-sm-2 col-form-label">Nis</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='nis' value="{{ $item->nis }}" id="nis">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' value="{{ $item->nama }}" id="nama"> 
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-10">
                {{-- <input type="text" class="form-control" name='kelas' value="{{ old('kelas') }}" id="kelas"> --}}
                <select class="form-select" name="kelas_id" id="kelas_id">
                    <option selected></option>
                @foreach ($kelas as $items)
                @if(old('kelas_id',$item->kelas_id) == $items->id)
                    <option value="{{ $items->id }}" selected>{{$items->nama}}</option>
                    @else
                    <option value="{{$items->id}}"> {{$items->nama}}</option>
                    @endif
                @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal lahir</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name='tgl_lahir' value="{{ $item->tgl_lahir }}" id="tgl_lahir"> 
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alamat' value="{{ $item->alamat }}" id="alamat">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="#" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-dark" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
<!-- AKHIR FORM -->
@endsection
