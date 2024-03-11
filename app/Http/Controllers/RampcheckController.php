<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rampcheck;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
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
            'panel_led_dalam' => $request->panel_led_dalam,
            'lampu_kabin' => $request->lampu_kabin,
            'klakson' => $request->klakson,
            'konektor_pintu_hidrolik' => $request->konektor_pintu_hidrolik,
            'handgrip' => $request->handgrip,
            'tempat_sampah' => $request->tempat_sampah,
            'apar' => $request->apar,
            'palu_darurat' => $request->palu_darurat,
            'pjk' => $request->pjk,
            'ban' => $request->ban,
            'ac' => $request->ac,
            'panel_led_luar' => $request->panel_led_luar,
            'lampu_utama' => $request->lampu_utama,
            'lampu_sein' => $request->lampu_sein,
            'lampu_senja' => $request->lampu_senja,
            'wiper_washer' => $request->wiper_washer,
            'spion' => $request->spion,
            'lampu_mundur' => $request->lampu_mundur,
            'lampu_rem' => $request->lampu_rem,
            'lampu_plat_nopol' => $request->lampu_plat_nopol,
            'dongkrak' => $request->dongkrak,
            'pembuka_roda' => $request->pembuka_roda,
            'segitiga_pengaman' => $request->segitiga_pengaman,
            'ban_cadangan' => $request->ban_cadangan,
            'catatan_rampcheck' => $request->catatan_rampcheck
        ];

        
        if($data->fails()) {
            for($i=0; $i<count($data->errors()); $i++) {
                flash()->addError($data->errors()->all()[$i]);
            }
        }

        $fileName = time() . '.' . $request->file('ttd_kepala_gudang')->extension();

        if($request->hasFile('ttd_kepala_gudang')) {
            $column['ttd_kepala_gudang'] = $request->file('ttd_kepala_gudang')->store('uploads', 'public', $fileName);
            $column['status'] = 'APPROVE';
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
        $pdf = FacadePdf::loadView('print-templates/rampcheck-pdf', $data);
        return $pdf->stream('Rampcheck.pdf');
        
    }

}
