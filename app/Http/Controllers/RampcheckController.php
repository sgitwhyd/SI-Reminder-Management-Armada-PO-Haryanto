<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_rampcheck;
use Illuminate\Support\Str;

class RampcheckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'list_rampcheck' => M_rampcheck::all(),
        ];
        return view('kepala_gudang.rampcheck', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kepala_gudang.tambah-rampcheck');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'checker' => 'required',
            'date_check' => 'required',
            'time_check' => 'required',
            'no_polisi' => 'required',
            'no_lambung' => 'required',
            'posisi_kilometer' => 'required|numeric',
            'posisi_bbm' => 'required',
            'ttd_checker' => 'required|file|max:1024',
            'ttd_pengemudi' => 'required|file|max:1024',
        ]);

        if ($request->hasFile('ttd_checker')) {
            // ttd_checker
            $ttd_1 = $request->file('ttd_checker');
            $rd_name1 = Str::random(15); // random caracter generator
            $ext1 = $ttd_1->getClientOriginalExtension();
            $fileName1 = time().'_'.$rd_name1.'.'.$ext1;
            $ttd_checker = $ttd_1->storeAs('uploads', $fileName1); // Store file in 'storage/app/uploads' directory
            // ttd_pengemudi
            $ttd_2 = $request->file('ttd_pengemudi');
            $rd_name2 = Str::random(15); // random caracter generator
            $ext2 = $ttd_2->getClientOriginalExtension();
            $fileName2 = time().'_'.$rd_name2.'.'.$ext2;
            $ttd_pengemudi = $ttd_2->storeAs('uploads', $fileName2); // Store file in 'storage/app/uploads' directory
        }

        $column = [
            'checker' => $request->checker,
            'tgl_rampcheck' => $request->date_check,
            'waktu_rampcheck' => $request->time_check,
            'no_polisi' => $request->no_polisi,
            'no_lambung' => $request->no_lambung,
            'posisi_kilometer' => $request->posisi_kilometer,
            'posisi_bbm' => $request->posisi_bbm,
            'panel_led_dalam' => isset($request->pld_ada) ? 'ADA' : 'TIDAK ADA',
            'lampu_kabin' => isset($request->lampu_kabin_ada) ? 'ADA' : 'TIDAK ADA',
            'klakson' => isset($request->klakson_ada) ? 'ADA' : 'TIDAK ADA',
            'konektor_panel_hidrolik' => isset($request->konektor_ph_ada) ? 'ADA' : 'TIDAK ADA',
            'handgrip' => isset($request->handgrip_ada) ? 'ADA' : 'TIDAK',
            'tempat_sampah' => isset($request->tempat_sampah_ada) ? 'ADA' : 'TIDAK ADA',
            'apar' => isset($request->apar_ada) ? 'ADA' : 'TIDAK ADA',
            'palu_darurat' => isset($request->palu_darurat_ada) ? 'ADA' : 'TIDAK ADA',
            'pjk' => isset($request->pjk_ada) ? 'ADA' : 'TIDAK ADA',
            'ban' => isset($request->ban_ada) ? 'ADA' : 'TIDAK ADA',
            'ac' => isset($request->ac_ada) ? 'ADA' : 'TIDAK ADA',
            'panel_led_luar' => isset($request->pld_ada)? 'ADA' : 'TIDAK ADA',
            'lampu_utama' => isset($request->lampu_utama_ada) ? 'ADA' : 'TIDAK ADA',
            'lampu_sein' => isset($request->lampu_sein_ada) ? 'ADA' : 'TIDAK ADA',
            'lampu_senja' => isset($request->lampu_senja_ada) ? 'ADA' : 'TIDAK ADA',
            'wiper_washer' => isset($request->wiper_washer_ada) ? 'ADA' : 'TIDAK ADA',
            'spion' => isset($request->spion_ada) ? 'ADA' : 'TIDAK ADA',
            'lampu_mundur' => isset($request->lampu_mundur) ? 'ADA' : 'TIDAK ADA',
            'lampu_rem' => isset($request->lampu_rem_ada) ? 'ADA' : 'TIDAK',
            'lampu_plat_nopol' => isset($request->lampu_plat_nopol_ada) ? 'ADA' : 'TIDAK ADA',
            'dongkrak' => isset($request->dongkrak_ada)? 'ADA' : 'TIDAK ADA',
            'pembuka_roda' => isset($request->pembuka_roda_ada)? 'ADA' : 'TIDAK ADA',
            'segitiga_pengaman' => isset($request->segitiga_pengaman_ada)? 'ADA' : 'TIDAK ADA',
            'ban_cadangan' => isset($request->ban_cadangan_ada)? 'ADA' : 'TIDAK ADA',
            'catatan_rampcheck' => $request->catatan_rampcheck,
            'ttd_checker' => $ttd_checker,
            'ttd_pengemudi' => $ttd_pengemudi,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        try {
            M_rampcheck::create($column);
            return redirect()->to('kepala-gudang/rampcheck')->with('success', 'Rampcheck berhasil ditambahkan.');
        }
        catch(Exception $e) {
            return redirect()->back()->with('error', $e->getMessage)->withInput();
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
