<?php

namespace App\Http\Controllers;

use App\Models\Perawatan;
use App\Models\Perbaikan;
use Illuminate\Http\Request;

class CrewController extends Controller
{
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
