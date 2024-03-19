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

    protected $busId;

    public function __construct()
    {
        $this->busId = Auth::user()->id_armada ?? null;
    }
    
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
        $data = Perbaikan::where('id_armada', $this->busId)->orderBy('created_at', 'DESC')->with('spareparts')->get();
        return view('crew.riwayat-perbaikan', compact('data'));
    }

    public function riwayatPerawatan()
    {
        $data = Perawatan::where('id_armada', $this->busId)->orderBy('created_at', 'DESC')->get();
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
        $armada = Armada::where('id', $user->id_armada)->first();

        $column = [
            'user_id' => $user->id_user,
            'id_armada' => $armada->id,
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

        $fileName = time() . '.' . $request->file('ttd_checker')->extension();


        if($request->hasFile('ttd_checker')) {
            $column['ttd_checker'] = $request->file('ttd_checker')->store('uploads', 'public', $fileName);
            $column['status'] = 'PENDING';
        }

        Rampcheck::create($column);

        flash()->addSuccess('Rampcheck berhasil dibuat');

        return redirect()->back();
    }

    public function riwayatRampcheck()
    {
        $user = Auth::user();
        $armada = Armada::where('id', $user->id_armada)->first();
        $list_rampcheck = Rampcheck::where('id_armada', $armada->id)->orderBy('created_at', 'DESC')->get();
        return view('crew.riwayat-rampcheck', compact('list_rampcheck'));
    }


}
