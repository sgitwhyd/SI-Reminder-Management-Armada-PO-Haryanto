<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Perawatan;
use App\Models\Perbaikan;
use App\Models\Rampcheck;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CrewController extends Controller
{

    public function index()
    {
        $today = Carbon::now();
        $busId = 1;
        $dataBus = Armada::where('id', $busId)->first();
        $dataPerawatan = Perawatan::where('id_armada', $busId)->latest('created_at')->first();
        // ganti 3 bulan sesuai dengan interval perawatan
        $alertPerawatan = Carbon::parse($dataPerawatan->tanggal)->addDays(5);
        if($today->gt($alertPerawatan)) {
            $alertPerawatan = $dataPerawatan;
        } else {
            $alertPerawatan = null;
        }
        return view('crew.dashboard', compact('dataBus', 'alertPerawatan'));

    }

    public function riwayatPerbaikan()
    {
        $data = Perbaikan::where('id_armada', 1)->orderBy('created_at', 'DESC')->with('spareparts')->get();
        return view('crew.riwayat-perbaikan', compact('data'));
    }

    public function riwayatPerawatan()
    {
        $data = Perawatan::where('id_armada', 1)->orderBy('created_at', 'DESC')->get();
        return view('crew.riwayat-perawatan', compact('data'));
    }


}
