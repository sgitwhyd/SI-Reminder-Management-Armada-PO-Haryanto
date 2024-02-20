<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sparepart;
use Session;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_sparepart = Sparepart::all();
        $data = [
            'list_sparepart' => $list_sparepart,
        ];
        return view('kepala_gudang.sparepart', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $isValid = $request->validate([
                'kode_sparepart' => 'required|unique:spareparts',
                'nama_sparepart' => 'required|unique:spareparts',
                'stock' => 'required',
                'status' => 'required',
            ]);
            if (!$isValid) {
                return response()->json([
                    'success' => 'false',
                    'errors'  => $isValid->errors()->all(),
                ], 400);
            } else {
                try {
                    Sparepart::create($request->all());
                    // return response()->json([
                    //     'success' => true,
                    //     'message'  => 'Armada berhasil ditambahkan.',
                    // ], 200);
                    Session::flash('success', 'Sparepart berhasil ditambahkan.');
                    return response()->json(['success' => true], 200);
                }
                catch(Exception $e) {
                    return response()->json([
                        'success' => 'false',
                        'errors'  => $e->getMessage(),
                    ], 400);
                }
            }
        }
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
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            $sparepart = Sparepart::findOrFail($request->id);
            return response()->json($sparepart);
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {
            // check if request data if same with old data (soon)
            $isValid = $request->validate([
                'kode_sparepart' => 'required',
                'nama_sparepart' => 'required',
                'stock' => 'required',
                'status' => 'required',
            ]);

            if (!$isValid) {
                return response()->json([
                    'success' => 'false',
                    'errors'  => $isValid->errors()->all(),
                ], 400);
            } else {
                try {
                    $sparepart = [
                        'kode_sparepart' => $request->kode_sparepart,
                        'nama_sparepart' => $request->nama_sparepart,
                        'stock' => $request->stock,
                        'status' => $request->status,
                    ];
                    Sparepart::where('id', $request->id_sp)->update($sparepart);
                    // return response()->json([
                    //     'success' => true,
                    //     'message'  => 'Sparepart berhasil ditambahkan.',
                    // ], 200);
                    Session::flash('success', 'Sparepart berhasil diubah.');
                    return response()->json(['success' => true], 200);
                }
                catch(Exception $e) {
                    return response()->json([
                        'success' => 'false',
                        'errors'  => $e->getMessage(),
                    ], 400);
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $armada = Sparepart::findOrFail($id);
        $armada->delete();
        Session::flash('success', 'Sparepart berhasil dihapus.');
        return response()->json(['success' => true], 200);
    }
}
