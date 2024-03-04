<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Perawatan;
use App\Models\Perbaikan;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexKepalaGudang()
    {
        return view('kepala_gudang.dashboard');
    }
}
