<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Armada;
use Session;


class ArmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_armada = Armada::all();
        $data = [
            'list_armada' => $list_armada,
        ];
        return view('kepala_gudang.armada', $data);
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
                'no_polisi' => 'required|unique:armadas',
                'no_lambung' => 'required|unique:armadas',
                'no_stnk' => 'required|unique:armadas',
                'tahun' => 'required',
                'trayek' => 'required',
                'jenis_trayek' => 'required',
                'gambar_armada' => 'required|file|max:1024',
            ]);

            if (!$isValid) {
                return response()->json([
                    'success' => 'false',
                    'errors'  => $isValid->errors()->all(),
                ], 400);
            } else {
                if ($request->hasFile('gambar_armada')) {
                    $ttd_1 = $request->file('gambar_armada');
                    $rd_name1 = Str::random(15); // random caracter generator
                    $ext1 = $ttd_1->getClientOriginalExtension();
                    $gambar_armada = time().'_'.$rd_name1.'.'.$ext1;
                    $file_path1 = $ttd_1->storeAs('public/armada', $gambar_armada); // Store file in 'storage/app/uploads' directory
                    $request['gambar_armada'] = $gambar_armada;
                }

                try {
                    Armada::create($request->all());
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
            $armada = Armada::findOrFail($request->id);
            return response()->json($armada);
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {
            // check if request data same with old data (soon)
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
                    $armada = [
                        'no_polisi' => $request->no_polisi,
                        'no_lambung' => $request->no_lambung,
                        'no_stnk' => $request->no_stnk,
                        'tahun' => $request->tahun,
                        'trayek' => $request->trayek,
                        'jenis_trayek' => $request->jenis_trayek,
                    ];
                    Armada::where('id', $request->id_armada)->update($armada);
                
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
    public function destroy($id)
    {
        $armada = Armada::findOrFail($id);
        $armada->delete();
        Session::flash('success', 'Armada berhasil dihapus.');
        return response()->json(['success' => true], 200);
    }
}
