<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_armada;
use App\Models\Perawatan;

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
        $data = [
            'jenis_trayek' => M_armada::get_enum_values('master_armada', 'jenis_trayek'),
        ];
        return view('add-perawatan', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}