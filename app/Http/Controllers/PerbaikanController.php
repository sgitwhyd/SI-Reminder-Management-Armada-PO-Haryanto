<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Perbaikan;
use App\Models\Sparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PerbaikanController extends Controller
{
    public function showPerbaikan()
    {
        $data = Perbaikan::whereHas('spareparts', function ($query) {
            $query->where('perbaikan_has_spareparts.perbaikan_id', '=', DB::raw('perbaikans.id'));
        })->with('sparepart')->orderBy('created_at', 'DESC')->get();
        return view('kepala_gudang.perbaikan', compact('data'));
    }

    public function createPerbaikan()
    {
        $data_armada = Armada::all();
        $data_sparepart = Sparepart::all();
        return view('kepala_gudang.buat-perbaikan', compact('data_armada', 'data_sparepart'));
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

        $spareparts = json_decode($request->spareparts, true);
        $sparepartsPayload = [];

        $total = 0;
        foreach($spareparts as $sparepart) {
            $total += Sparepart::find($sparepart['id'])->harga * $sparepart['jumlah'];
            $sparepartsPayload[] = [
                'sparepart_id' => $sparepart['id'],
                'jumlah' => $sparepart['jumlah']
            ];
        }

        $validData = $validData->validated();


        $newData = [
            'id_armada' => $validData['id_armada'],
            'tanggal' => $validData['tanggal'],
            'keterangan' => $validData['keterangan'],
            'biaya' => $total
        ];

        $perbaikan = Perbaikan::create($newData);
        $perbaikan->spareparts()->attach($sparepartsPayload);
        flash()->addSuccess('Perbaikan berhasil ditambahkan');
        return redirect()->back();
    }

    public function detailPerbaikan($id)
    {
        $data = Perbaikan::where('id', $id)->with(['spareparts', 'sparepart'])->first();
        return view('kepala_gudang.detail-perbaikan', compact('data'));
    }
}
