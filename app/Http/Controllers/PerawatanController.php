<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use Illuminate\Http\Request;
use App\Models\Perawatan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PerawatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Perawatan::orderBy('created_at', 'desc')->get();
        return view('kepala_gudang.perawatan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_armada  = Armada::all();
        return view('kepala_gudang.buat-perawatan', compact('data_armada'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validData = Validator::make($request->all(), [
            'id_armada' => 'required|exists:armadas,id',
            'tanggal' => 'required',
            'oli_gardan' => 'required|string',
            'oli_mesin' => 'required|string',
            'ttd_kepala_gudang' => 'required|file|mimes:jpeg,png,jpg',
        ]);

        
        if($validData->fails()) {
            for($i = 0; $i < count($validData->errors()); $i++) {
                flash()->addError($validData->errors()->all()[$i]);
            }
            return redirect()->back();
        }

        $fileName = time() . '.' . $request->file('ttd_kepala_gudang')->extension();
        $dataToStore = [
            'id_armada' => $request->id_armada,
            'tanggal' => $request->tanggal,
            'oli_gardan' => $request->oli_gardan,
            'oli_mesin' => $request->oli_mesin,
            'oli_transmisi' => $request->oli_transmisi,
            'ttd_kepala_gudang' => $request->file('ttd_kepala_gudang')->store('uploads', 'public', $fileName),
        ];

        Perawatan::create($dataToStore);
        flash()->addSuccess('Perawatan berhasil ditambahkan');
        return redirect()->back();

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data_armada = Armada::all();
        $perawatan = Perawatan::find($id);
        return view('kepala_gudang/edit-perawatan', compact('data_armada', 'perawatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request->ttd_kepala_gudang);

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
        
        $dataToStore = [
            'id_armada' => $request->id_armada,
            'tanggal' => $request->tanggal,
            'oli_gardan' => $request->oli_gardan,
            'oli_mesin' => $request->oli_mesin,
            'oli_transmisi' => $request->oli_transmisi,
        ];
        if($request->ttd_kepala_gudang) {
            $fileName = time() . '.' . $request->file('ttd_kepala_gudang')->extension();
            $dataToStore['ttd_kepala_gudang'] = $request->file('ttd_kepala_gudang')->store('uploads', 'public', $fileName);
        }

        Perawatan::where('id', $request->id_perawatan)->update($dataToStore);
        flash()->addSuccess('Perawatan berhasil diubah');
        return $this->index();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $perawatan = Perawatan::findOrFail($id);
        $perawatan->delete();
        Session::flash('success', 'Perawatan berhasil dihapus.');
        return response()->json(['success' => true], 200);
    }
}
