<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    $jumlahbaris = 5;
    $search = $request->query('search');

    $data = kelas::when($search, function ($query) use ($search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        })
        ->orderBy('id', 'desc')
        ->paginate($jumlahbaris);

    if ($data->isEmpty()) {
        return view('dashboard.kelas.all')->with(['data' => $data, 'search' => $search])->with('noData', 'Tidak ada data ditemukan.');
    }

    return view('dashboard.kelas.all')->with(['data' => $data, 'search' => $search]);
    }


    public function index2(Request $request)
    {
    $jumlahbaris = 5;
    $search = $request->query('search');

    $data = kelas::when($search, function ($query) use ($search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        })
        ->orderBy('id', 'desc')
        ->paginate($jumlahbaris);

    if ($data->isEmpty()) {
        return view('kelas.all')->with(['data' => $data, 'search' => $search])->with('noData', 'Tidak ada data ditemukan.');
    }

    return view('kelas.all')->with(['data' => $data, 'search' => $search]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'unique:kelas,nama'],
        ], [
            'nama.required' => 'Nama Kelas Harus Diisi!',
            'nama.unique' => 'Nama Kelas sudah digunakan!',
        ]);
    
        $data = [
            'nama' => $request->nama,
        ];
    
        kelas::create($data);
    
        return redirect()->to('/dashboard/kelas')->with('Success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kelas = kelas::findOrFail($id);
        return view('dashboard.kelas.detail', [
        "title" => "kelas",
        "kelas" => $kelas,
    ]);
    }

    public function show2(string $id)
    {
        $kelas = kelas::findOrFail($id);
        return view('kelas.detail', [
        "title" => "kelas",
        "kelas" => $kelas,
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelas = kelas::findOrFail($id);
        return view('dashboard.kelas.edit', [
        "title" => "kelas",
        "item" => $kelas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kelas)
    {
        $request->validate([
            'nama' => 'required',
        ],[
            'nama.required'=>'Nama Kelas Harus Diisi!',
        ]);
        $data = [
            'nama'=>$request->nama,
        ];
        kelas::where('id',$kelas)->update($data);
        return redirect()->to('/dashboard/kelas')->with('Success', 'Berhasil Memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $kelas)
    {
        kelas::where('id',$kelas)->delete();
        return redirect()->to('/dashboard/kelas')->with('Success', 'Berhasil menghapus data');
    }

    public function test()
    {
        $kelas=kelas::all();
        return response()->json($kelas,200);
    }
}
