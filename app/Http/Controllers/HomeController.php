<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Perawatan;
use App\Models\Perbaikan;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexKepalaGudang()
    {
        return view('kepala_gudang.dashboard');
    }

    public function multiUpload() {
        
        return view('welcome');
    }

    public function storeUpload(Request $request) {
        
        // dd($request->file('file_upload'));
        $fileName = time() . '.' . $request->file('file_upload')->extension();
        if($request->hasFile('file_upload')) {
            $request->file('file_upload')->store('uppy', 'public', $fileName);
        }

        return response()->json(['success' => true], 200);



    }
}
