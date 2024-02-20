<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Perawatan;
use App\Models\Perbaikan;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function indexKepalaGudang()
    {
        return view('kepala_gudang.dashboard');
    }

    public function indexCrew()
    {
        $today = Carbon::now();
        $busId = 1;
        $statusLayakJalan = Perbaikan::where('id_armada', $busId)->where('status', 'selesai')->first() && Perawatan::where('id_armada', $busId)->where('status', 'selesai')->first();
        $dataBus = Armada::where('id', $busId)->first();
        $alertPerawatan = Perawatan::where('id_armada', $busId)->where(function ($query) use ($today) {
            $query->whereNull('created_at')
                ->orWhere('created_at', '<', $today->startOfMonth()->addDays(18));
        })->first();
        return view('crew.dashboard', compact('statusLayakJalan', 'dataBus', 'alertPerawatan'));
    }

    public function indexMekanik()
    {
        return view('mekanik.dashboard');
    }
}
