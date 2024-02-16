<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_armada;
use Session;


class ArmadaController extends Controller
{

    public $m_armada;
    public function __construct()
    {
        $this->m_armada = new M_armada();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_armada = $this->m_armada::all();
        $jenis_trayek = $this->m_armada->get_enum_values('master_armada', 'jenis_trayek');
        $data = [
            'jenis_trayek' => $jenis_trayek,
            'list_armada' => $list_armada,
        ];
        return view('armada', $data);
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
                'no_polisi' => 'required|unique:master_armada',
                'no_lambung' => 'required|unique:master_armada',
                'no_stnk' => 'required|unique:master_armada',
                'tahun' => 'required',
                'trayek' => 'required',
                'jenis_trayek' => 'required',
            ]);

            if (!$isValid) {
                return response()->json([
                    'success' => 'false',
                    'errors'  => $isValid->errors()->all(),
                ], 400);
            } else {
                try {
                    M_armada::create($request->all());
                    // return response()->json([
                    //     'success' => true,
                    //     'message'  => 'Armada berhasil ditambahkan.',
                    // ], 200);
                    Session::flash('success', 'Armada berhasil ditambahkan.');
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
            $armada = M_armada::findOrFail($request->id);
            return response()->json($armada);
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->ajax()) {
            $isValid = $request->validate([
                'no_polisi' => 'required',
                'no_lambung' => 'required',
                'no_stnk' => 'required',
                'tahun' => 'required',
                'trayek' => 'required',
                'jenis_trayek' => 'required',
            ]);

            if (!$isValid) {
                return response()->json([
                    'success' => 'false',
                    'errors'  => $isValid->errors()->all(),
                ], 400);
            } else {
                try {
                    M_armada::update($request->all());
                    // return response()->json([
                    //     'success' => true,
                    //     'message'  => 'Armada berhasil ditambahkan.',
                    // ], 200);
                    Session::flash('success', 'Armada berhasil diubah.');
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
        //
    }
}
