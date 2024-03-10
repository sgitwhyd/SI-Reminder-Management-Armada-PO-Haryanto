<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Perawatan;
use App\Models\Perbaikan;
use App\Models\Rampcheck;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CrewController extends Controller
{

    public function index()
    {
        $today = Carbon::now();
        $busId = Auth::user()->id_armada;
        $dataBus = Armada::where('id', $busId)->first();
        $dataPerawatan = Perawatan::where('id_armada', $busId)->latest('created_at')->first();
        // ganti 3 bulan sesuai dengan interval perawatan
        $alertPerawatan = null;
        if($dataPerawatan) {
            $alertPerawatan = Carbon::parse($dataPerawatan->tanggal)->addDays(1);
            if($today->gt($alertPerawatan)) {
                $alertPerawatan = $dataPerawatan;
            } else {
                $alertPerawatan = null;
            }
        }
        return view('crew.dashboard', compact('dataBus', 'alertPerawatan'));

    }

    public function riwayatPerbaikan()
    {
        $data = Perbaikan::where('id_armada', 1)->orderBy('created_at', 'DESC')->with('spareparts')->get();
        return view('crew.riwayat-perbaikan', compact('data'));
    }

    public function riwayatPerawatan()
    {
        $data = Perawatan::where('id_armada', 1)->orderBy('created_at', 'DESC')->get();
        return view('crew.riwayat-perawatan', compact('data'));
    }

    public function createRampcheck()
    {
        return view('crew.buat-rampcheck');
    }

    public function storeRampcheck(Request $request)
    {
        $data = Validator::make($request->all(), [
            'date_check' => 'required',
            'time_check' => 'required',
            'posisi_kilometer' => 'required|numeric',
            'posisi_bbm' => 'required',
            'ttd_checker' => 'required|file|max:1024',
            'catatan_rampcheck' => 'required|string',
        ]);

        $user = Auth::user();
        // change dengan id bus relasi dengan user
        $armada = Armada::where('id', 1)->first();

        $column = [
            'id_armada' => 1,
            'user_id' => $user->id_user,
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
        ];

        if($data->fails()) {
            for($i=0; $i<count($data->errors()); $i++) {
                flash()->addError($data->errors()->all()[$i]);
            }
        }

        $fileName = time() . '.' . $request->file('ttd_checker')->extension();


        if($request->hasFile('ttd_checker')) {
            $column['ttd_checker'] = $request->file('ttd_checker')->store('uploads', 'public', $fileName);
        }

        Rampcheck::create($column);

        flash()->addSuccess('Rampcheck berhasil dibuat');

        return redirect()->back();
    }

    public function riwayatRampcheck()
    {
        $list_rampcheck = Rampcheck::where('id_armada', 1)->orderBy('created_at', 'DESC')->get();
        return view('crew.riwayat-rampcheck', compact('list_rampcheck'));
    }


}
