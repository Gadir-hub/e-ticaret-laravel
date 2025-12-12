<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required'
        ]);

        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            $request->session()->regenerate();
            
            if (Auth::user()->role === 'satici') {
                return redirect('/seller/products');
            } else {
                // ALICIYI GÜVENLİ SAYFAYA YÖNLENDİR
                return redirect('/dashboard-buyer');
            }
        }

        return back()->withErrors([
            'name' => 'Kullanıcı adı veya şifre hatalı.',
        ]);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:alici,satici'
        ]);

        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]);

            DB::commit();

            return redirect()->route('login')->with('success', 'Kayıt başarılı! Şimdi giriş yapabilirsiniz.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors([
                'error' => 'Kayıt işlemi sırasında bir hata oluştu: ' . $e->getMessage()
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}