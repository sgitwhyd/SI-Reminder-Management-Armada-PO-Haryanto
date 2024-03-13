<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Perawatan;
use App\Models\Perbaikan;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function indexKepalaGudang()
    {
        $data = Perawatan::select('perawatans.*')
                ->with('armada')
                ->whereIn('id', function ($query) {
                    $query->select(DB::raw('MAX(id)'))
                        ->from('perawatans')
                        ->groupBy('id_armada');
                        
                })
                ->latest('created_at')
                ->get();
      
        $alertPerawatan = [];
        $today = Carbon::now()->toString();
        $test = [];
        foreach ($data as $key => $value) {
            $tanggalRutinPerawatan = Carbon::parse($value->tanggal)->addDays(1);
            $test[] = $tanggalRutinPerawatan;
            if($today >= $tanggalRutinPerawatan) {
                $alertPerawatan[] = $value;
            } else {
                $alertPerawatan = null;
            }
        }


        return view('kepala_gudang.dashboard', compact('alertPerawatan'));
    }
}
