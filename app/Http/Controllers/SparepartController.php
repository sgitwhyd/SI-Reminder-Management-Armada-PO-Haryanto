<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_sparepart;
use Session;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_sparepart = M_sparepart::all();
        $status_sp = M_sparepart::get_enum_values('master_sparepart', 'status');
        $data = [
            'status_sp' => $status_sp,
            'list_sparepart' => $list_sparepart,
        ];
        return view('sparepart', $data);
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
                'no_sp' => 'required|unique:master_sparepart',
                'nama_sp' => 'required|unique:master_sparepart',
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
                    M_sparepart::create($request->all());
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
            $sparepart = M_sparepart::findOrFail($request->id);
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
                'no_sp' => 'required',
                'nama_sp' => 'required',
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
                        'no_sp' => $request->no_sp,
                        'nama_sp' => $request->nama_sp,
                        'stock' => $request->stock,
                        'status' => $request->status,
                    ];
                    M_sparepart::where('id_sp', $request->id_sp)->update($sparepart);
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
    public function destroy(string $id)
    {
        $armada = M_sparepart::findOrFail($id);
        $armada->delete();

        Session::flash('success', 'Sparepart berhasil dihapus.');
        return response()->json(['success' => true], 200);
    }
}
