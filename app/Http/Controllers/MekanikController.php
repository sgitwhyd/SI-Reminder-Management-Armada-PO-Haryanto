<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Perawatan;
use App\Models\Perbaikan;
use App\Models\Sparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MekanikController extends Controller
{

    public function showPerawatan()
    {
        $data = Perawatan::orderBy('status', 'desc')->get();
        return view('mekanik.perawatan', compact('data'));
    }

    public function createPerawatan()
    {
        $data = Armada::all();
        return view('mekanik.tambah-perawatan', compact('data'));
    
    }

    public function storePerawatan(Request $request)
    {
        $validData = Validator::make($request->all(), [
            'id_armada' => 'required|exists:armadas,id',
            'tanggal' => 'required',
            'oli_gardan' => 'required|string',
            'oli_transmisi' => 'required|string',
            'oli_mesin' => 'required|string',
        ]);

    
        if($validData->fails()) {
            for($i = 0; $i < count($validData->errors()); $i++) {
                flash()->addError($validData->errors()->all()[$i]);
            }
            return redirect()->back();
        }


        Perawatan::create($validData->validated());
        flash()->addSuccess('Perawatan berhasil ditambahkan');
        return redirect()->back();
    }

    public function showPerbaikan()
    {
        $data = Perbaikan::orderBy('status', 'desc')->get();
        return view('mekanik.perbaikan', compact('data'));
    }

    public function createPerbaikan()
    {
        $data = Armada::all();
        $spareparts = Sparepart::all();
        return view('mekanik.tambah-perbaikan', compact('data', 'spareparts'));
    }

    public function storePerbaikan(Request $request)
    {
        $validData = Validator::make($request->all(), [
            'id_armada' => 'required|exists:armadas,id',
            'tanggal' => 'required',
            'spareparts' => 'required',
            'keterangan' => 'required|string',
        ]);

        if($validData->fails()) {
            for($i = 0; $i < count($validData->errors()); $i++) {
                flash()->addError($validData->errors()->all()[$i]);
            }
            return redirect()->back();
        }

        $total = 0;
        foreach($request->spareparts as $sparepart) {
            $total += Sparepart::find($sparepart)->harga;
        }

        $validData = $validData->validated();

        $newData = [
            'id_armada' => $validData['id_armada'],
            'tanggal' => $validData['tanggal'],
            'keterangan' => $validData['keterangan'],
            'biaya' => $total
        ];

        $perbaikan = Perbaikan::create($newData);
        $perbaikan->spareparts()->attach($request->spareparts);
        flash()->addSuccess('Perbaikan berhasil ditambahkan');
        return redirect()->back();
    }
}