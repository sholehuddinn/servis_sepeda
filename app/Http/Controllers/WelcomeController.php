<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

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
}
