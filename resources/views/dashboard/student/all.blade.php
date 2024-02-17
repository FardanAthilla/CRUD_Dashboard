@extends('dashboard.layouts.main')

@section('content')
<div class="container">
    <h1 class="display-4 mt-4">Ini adalah Halaman Student</h1>

    <form class="form-inline mt-4 mb-4" method="GET" action="{{ url('dashboard/student') }}">
        <div class="form-group">
            <input type="text" class="form-control" name="search" placeholder="Cari NIS, Nama, atau Kelas" value="{{ $search }}">
        </div>
        <button type="submit" class="btn btn-dark ml-2 mt-2">Cari</button>
    </form>


    <div class="table-responsive mt-4">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">NIS</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Kelas</th>

                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $index => $student)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $student->nis }}</td>
                        <td>{{ $student->nama }}</td>
                        <td>{{ $student->kelas->nama }}</td>
                        
                        <td class="text-center">
                            <a href='student/{{ $student->id}}/edit' class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <a href='student/{{ $student->id }}' class="btn btn-info btn-sm"><i class="fas fa-info"></i></a>
                            <form onsubmit="return confirm('Yakin menghapus data?')" class="d-inline" action="{{ url('/dashboard/student/'.$student->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if(isset($noData))
        <div class="container text-center mt-4">
            <p class="lead">{{ $noData }}</p>
        </div>
    @else
    @endif
    </div>
    {{ $data->withQueryString()->links() }}
</div>
<div class="pb-3">
    <a href='{{ url('dashboard/student/create') }}' class="btn btn-dark">+ Tambah Data</a>
</div>

@endsection
