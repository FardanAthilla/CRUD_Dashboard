<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class register extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:255',
        ]);

        $validatedData['password']= Hash::make($validatedData['password']);

        User::create($validatedData);
        $request->session()->flash('success','Register Berhasil, Silahkan login!');

        return redirect('/login');
    }
}
