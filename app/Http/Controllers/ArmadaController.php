<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_armada;


class ArmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $m_armada = new M_armada();
        $jenis_trayek = $m_armada->get_enum_values('master_armada', 'jenis_trayek');
        $data = [
            'jenis_trayek' => $jenis_trayek,
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
        //
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
