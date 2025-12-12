<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Konum;
use App\Models\Talep;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $konumlar = Konum::with('kullanici')->get();
        $talepler = Talep::with('kullanici')->get();

        return view('dashboard', compact('users', 'konumlar', 'talepler'));
    }
}
