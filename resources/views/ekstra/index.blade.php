@extends('layouts.main')

@section('content')

        <h1 class="display-4 mt-4 mb-4">Ini adalah Halaman Ekstrakurikuler  </h1>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Ekstra</th>
                    <th class="text-center">Pembina</th>
                    <th class="text-center">Deskripsi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)   
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->pembina }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td class="text-center">
                        <a href='ekstra/{{ $item->id}}/edit' class="btn btn-warning btn-sm">Edit</a>
                        <form onsubmit="return confirm('Yakin menghapus data?')" class="d-inline" action="{{ url('ekstra/'.$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">X</button>
                        </form>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pb-3">
            <a href='{{ url('ekstra/create') }}' class="btn btn-dark">+ Tambah Data</a>
        </div>
        {{ $data->withQueryString()->links() }}
@endsection
