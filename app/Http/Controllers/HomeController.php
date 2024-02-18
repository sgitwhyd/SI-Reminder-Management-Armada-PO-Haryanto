<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexKepalaGudang()
    {
        return view('kepala_gudang.dashboard');
    }

    public function indexCrew()
    {
        return view('crew.dashboard');
    }

    public function indexMekanik()
    {
        return view('mekanik.dasboard');
    }
}
