<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\kelas;
use Illuminate\Support\Facades\Session;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $jumlahbaris = 5;
    $search = $request->query('search');

    $data = Student::when($search, function ($query) use ($search) {
            return $query->where('nis', 'like', '%' . $search . '%')
                         ->orWhere('nama', 'like', '%' . $search . '%')
                         ->orWhere('kelas_id', 'like', '%' . $search . '%');
        })
        ->orderBy('id', 'desc')
        ->paginate($jumlahbaris);

    if ($data->isEmpty()) {
        return view('dashboard.student.all')->with(['data' => $data, 'search' => $search])->with('noData', 'Tidak ada data ditemukan.');
    }

    return view('dashboard.student.all')->with(['data' => $data, 'search' => $search]);
}


public function index2(Request $request)
{
    $jumlahbaris = 5;
    $search = $request->query('search');

    $data = Student::when($search, function ($query) use ($search) {
            return $query->where('nis', 'like', '%' . $search . '%')
                         ->orWhere('nama', 'like', '%' . $search . '%')
                         ->orWhere('kelas_id', 'like', '%' . $search . '%');
        })
        ->orderBy('id', 'desc')
        ->paginate($jumlahbaris);

    if ($data->isEmpty()) {
        return view('student.all')->with(['data' => $data, 'search' => $search])->with('noData', 'Tidak ada data ditemukan.');
    }

    return view('student.all')->with(['data' => $data, 'search' => $search]);
}
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.student.create', [
            "kelas" => kelas::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nis' => ['required', 'unique:students,nis'],
        'nama' => 'required',
        'kelas_id' => 'required',
        'alamat' => 'required',
        'tgl_lahir' => 'required'
    ], [
        'nis.required' => 'NIS Harus Diisi!',
        'nis.unique' => 'NIS sudah digunakan!',
        'nama.required' => 'Nama Harus Diisi!',
        'kelas_id.required' => 'Kelas Harus Diisi!',
        'alamat.required' => 'Alamat Harus Diisi!',
        'tgl_lahir.required' => 'Tanggal lahir Harus Diisi!'
    ]);

    $data = [
        'nis' => $request->nis,
        'nama' => $request->nama,
        'kelas_id' => $request->kelas_id,
        'alamat' => $request->alamat,
        'tgl_lahir' => $request->tgl_lahir,
    ];

    Student::create($data);

    return redirect()->to('/dashboard/student')->with('Success', 'Berhasil menambahkan data');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('dashboard.student.detail', [
        "student" => $student,
    ]);
    }

    public function show2(string $id)
    {
        $student = Student::findOrFail($id);
        return view('student.detail', [
        "student" => $student,
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student)
    {
        return view('dashboard.student.edit', [
            'item' => $student,
            'kelas' => kelas::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $student)
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'kelas_id' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required'
        ],[
            'nis.required'=>'Nis ekstra Harus Diisi!',
            'nama.required'=>'Nama ekstra Harus Diisi!',
            'kelas_id.required'=>'Kelas ekstra Harus Diisi!',
            'alamat.required'=>'Alamat ekstra Harus Diisi!',
            'tgl_lahir.required'=>'Tanggal lahir ekstra Harus Diisi!'
        ]);
        $data = [
            'nis'=>$request->nis,
            'nama'=>$request->nama,
            'kelas_id'=>$request->kelas_id,
            'alamat'=>$request->alamat,
            'tgl_lahir'=>$request->tgl_lahir,
        ];
        student::where('id',$student)->update($data);
        return redirect()->to('/dashboard/student')->with('Success', 'Berhasil Memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $student)
    {
        student::where('id',$student)->delete();
        return redirect()->to('/dashboard/student')->with('Success', 'Berhasil menghapus data');
    }

    public function test()
    {
        $students=student::all();
        return response()->json($students,200);
    }
}

