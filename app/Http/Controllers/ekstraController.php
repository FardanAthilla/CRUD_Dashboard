<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\ekstra;
use Illuminate\Http\Request;

class ekstraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $jumlahbaris = 5;
    $data = ekstra::orderBy('id', 'desc')->paginate($jumlahbaris);

    return view('ekstra.index')->with('data', $data);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ekstra.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nama',$request->nama);
        Session::flash('pembina',$request->pembina);
        Session::flash('deskripsi',$request->deskripsi);

        $request->validate([
            'nama' => 'required',
            'pembina' => 'required',
            'deskripsi' => 'required',
        ],[
            'nama.required'=>'nama ekstra Harus Diisi!',
            'pembina.required'=>'pembina ekstra Harus Diisi!',
            'deskripsi.required'=>'deskripsi ekstra Harus Diisi!'
        ]);
        $data = [
            'nama'=>$request->nama,
            'pembina'=>$request->pembina,
            'deskripsi'=>$request->deskripsi,
        ];
        ekstra::create($data);
        return redirect()->to('ekstra')->with('Success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ekstra $ekstra)
    {
        return view('ekstra.edit', [
            'item' => $ekstra,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $ekstra)
    {
        $request->validate([
            'nama' => 'required',
            'pembina' => 'required',
            'deskripsi' => 'required',
        ],[
            'nama.required'=>'nama ekstra Harus Diisi!',
            'pembina.required'=>'pembina ekstra Harus Diisi!',
            'deskripsi.required'=>'deskripsi ekstra Harus Diisi!'
        ]);
        $data = [
            'nama'=>$request->nama,
            'pembina'=>$request->pembina,
            'deskripsi'=>$request->deskripsi,
        ];
        ekstra::where('id',$ekstra)->update($data);
        return redirect()->to('ekstra')->with('Success', 'Berhasil Memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $ekstra)
    {
        ekstra::where('id',$ekstra)->delete();
        return redirect()->to('ekstra')->with('Success', 'Berhasil menghapus data');
    }
}
