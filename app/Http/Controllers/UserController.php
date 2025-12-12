<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Kullanıcı listesi (Blade view)
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Kullanıcı oluşturma formu
    public function create()
    {
        return view('users.create');
    }

    // Yeni kullanıcı ekleme
    public function store(Request $request)
    {
        $request->validate([
            'isim' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'sifre' => 'required|string|min:6',
            'rol' => 'required|string'
        ]);

        User::create([
            'name' => $request->isim,
            'email' => $request->email,
            'password' => Hash::make($request->sifre),
            'rol' => $request->rol
        ]);

        return redirect()->route('users.index')->with('success', 'Kullanıcı eklendi');
    }

    // Kullanıcı düzenleme formu
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Kullanıcı güncelle
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->isim ?? $user->name,
            'email' => $request->email ?? $user->email,
            'rol' => $request->rol ?? $user->rol
        ]);

        return redirect()->route('users.index')->with('success', 'Kullanıcı güncellendi');
    }

    // Kullanıcı sil
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Kullanıcı silindi');
    }
}
