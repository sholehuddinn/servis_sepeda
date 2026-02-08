<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class WelcomeController extends Controller
{
    public function index() {
        try {
            return view('welcome', [
                'layanan' => Layanan::all(),
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function clearAndLogin(Request $request)
    {
        // Logout kalau masih nyangkut
        Auth::logout();

        // Bersihkan session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Bersihkan cookie
        Cookie::queue(Cookie::forget('laravel_session'));
        Cookie::queue(Cookie::forget('remember_web'));
        Cookie::queue(Cookie::forget('token')); // kalau ada custom

        // Redirect ke login asli
        return redirect()->route('login');
    }
}
