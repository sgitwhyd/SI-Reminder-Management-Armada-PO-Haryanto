<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rampcheck;
use App\Models\User;
use PDF;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RampcheckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'list_rampcheck' => Rampcheck::all(),
        ];
        return view('kepala_gudang.rampcheck', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'CREW')->get();
        $armadas = Armada::all();
        return view('kepala_gudang.tambah-rampcheck', compact('users', 'armadas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'date_check' => 'required',
            'time_check' => 'required',
            'posisi_kilometer' => 'required|numeric',
            'posisi_bbm' => 'required',
            'ttd_kepala_gudang' => 'required|file|max:1024',
            'id_armada' => 'required',
            'catatan_rampcheck' => 'required|string',
        ]);

        $user = Auth::user();
        $armada = Armada::where('id', $request->id_armada)->first();


        $column = [
            'user_id' => $user->id_user,
            'id_armada' => $request->id_armada,
            'tgl_rampcheck' => $request->date_check,
            'waktu_rampcheck' => $request->time_check,
            'no_polisi' => $armada->no_polisi,
            'no_lambung' => $armada->no_lambung,
            'posisi_kilometer' => $request->posisi_kilometer,
            'posisi_bbm' => $request->posisi_bbm,
            'panel_led_dalam' => isset($request->pld_ada) ? 'ADA' : 'TIDAK ADA',
            'lampu_kabin' => isset($request->lampu_kabin_ada) ? 'ADA' : 'TIDAK ADA',
            'klakson' => isset($request->klakson_ada) ? 'ADA' : 'TIDAK ADA',
            'konektor_pintu_hidrolik' => isset($request->konektor_ph_ada) ? 'ADA' : 'TIDAK ADA',
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
            'lampu_mundur' => isset($request->lampu_mundur_ada) ? 'ADA' : 'TIDAK ADA',
            'lampu_rem' => isset($request->lampu_rem_ada) ? 'ADA' : 'TIDAK',
            'lampu_plat_nopol' => isset($request->lampu_plat_nopol_ada) ? 'ADA' : 'TIDAK ADA',
            'dongkrak' => isset($request->dongkrak_ada)? 'ADA' : 'TIDAK ADA',
            'pembuka_roda' => isset($request->pembuka_roda_ada)? 'ADA' : 'TIDAK ADA',
            'segitiga_pengaman' => isset($request->segitiga_pengaman_ada)? 'ADA' : 'TIDAK ADA',
            'ban_cadangan' => isset($request->ban_cadangan_ada)? 'ADA' : 'TIDAK ADA',
            'catatan_rampcheck' => $request->catatan_rampcheck,
            'status' => 'APPROVE'
        ];

        
        if($data->fails()) {
            for($i=0; $i<count($data->errors()); $i++) {
                flash()->addError($data->errors()->all()[$i]);
            }
        }


        $fileName = time() . '.' . $request->file('ttd_kepala_gudang')->extension();


        if($request->hasFile('ttd_kepala_gudang')) {
            $column['ttd_kepala_gudang'] = $request->file('ttd_kepala_gudang')->store('uploads', 'public', $fileName);
        }


        Rampcheck::create($column);
        flash()->addSuccess('Rampcheck berhasil ditambahkan.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = [
            'rampcheck' => Rampcheck::findOrFail($id),
        ];
        return view('kepala_gudang/edit-rampcheck', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validData = Validator::make($request->all(), [
            'status' => 'required',
            'ttd_kepala_gudang' => 'required|file|max:1024',
        ]);

        if($validData->fails()) {
            for($i=0; $i<count($validData->errors()); $i++) {
                flash()->addError($validData->errors()->all()[$i]);
            }
            return redirect()->back();
        }

        $fileName = time() . '.' . $request->file('ttd_kepala_gudang')->extension();

        $column = [
            'status' => $request->status,
            'ttd_kepala_gudang' => '',
        ];


        if($request->hasFile('ttd_kepala_gudang')) {
            $column['ttd_kepala_gudang'] = $request->file('ttd_kepala_gudang')->store('uploads', 'public', $fileName);
        }


        try {
            Rampcheck::where('id_rampcheck', $id)->update($column);
            return redirect()->to('kepala-gudang/rampcheck');
        } catch(Exception $e) {
            return redirect()->back()->with('error', $e->getMessage);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rampchcek = Rampcheck::findOrFail($id);
        $rampchcek->delete();
        Session::flash('success', 'Rampcheck berhasil dihapus.');
        return response()->json(['success' => true], 200);
    }

    public function rampcheckPDF($id)
    {
        $rampchcek = Rampcheck::findOrFail($id);
        // printout
        $data = [
            'rampcheck' => $rampchcek,
        ];

        // $pdf = PDF::load_html('print-templates/rampcheck-pdf');
        $pdf = PDF::loadView('print-templates/rampcheck-pdf', $data);
        return $pdf->stream('Rampcheck.pdf');
        
    }

}
