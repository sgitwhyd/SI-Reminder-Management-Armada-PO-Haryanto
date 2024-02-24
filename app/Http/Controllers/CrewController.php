<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Perawatan;
use App\Models\Perbaikan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CrewController extends Controller
{

    public function index()
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

    public function riwayatRampcheck()
    {
        return view('crew.rampcheck');
    }

    public function riwayatPerbaikan()
    {
        $data = Perbaikan::where('id_armada', 2)->orderBy('created_at', 'DESC')->with('spareparts')->paginate(10);
        return view('crew.riwayat-perbaikan', compact('data'));
    }

    public function riwayatPerawatan()
    {
        $data = Perawatan::where('id_armada', 2)->orderBy('created_at', 'DESC')->paginate(10);
        return view('crew.riwayat-perawatan', compact('data'));
    }


}
