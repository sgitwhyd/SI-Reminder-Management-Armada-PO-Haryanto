<?php

namespace App\Http\Controllers;

use App\Models\Perbaikan;
use Illuminate\Http\Request;
use App\Models\Sparepart;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_sparepart = Sparepart::all();
        $data = [
            'list_sparepart' => $list_sparepart,
        ];
        return view('kepala_gudang.sparepart', $data);
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
                'kode_sparepart' => 'required|unique:spareparts',
                'nama_sparepart' => 'required|unique:spareparts',
                'stock' => 'required',
                'status' => 'required',
            ]);
            if (!$isValid) {
                return response()->json([
                    'success' => 'false',
                    'errors'  => $isValid->errors()->all(),
                ], 400);
            } else {
                try {
                    Sparepart::create($request->all());
                    // return response()->json([
                    //     'success' => true,
                    //     'message'  => 'Armada berhasil ditambahkan.',
                    // ], 200);
                    Session::flash('success', 'Sparepart berhasil ditambahkan.');
                    return response()->json(['success' => true], 200);
                } catch(Exception $e) {
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
            $sparepart = Sparepart::findOrFail($request->id);
            return response()->json($sparepart);
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {
            // check if request data if same with old data (soon)
            $isValid = $request->validate([
                'kode_sparepart' => 'required',
                'nama_sparepart' => 'required',
                'stock' => 'required',
                'status' => 'required',
            ]);

            if (!$isValid) {
                return response()->json([
                    'success' => 'false',
                    'errors'  => $isValid->errors()->all(),
                ], 400);
            } else {
                try {
                    $sparepart = [
                        'kode_sparepart' => $request->kode_sparepart,
                        'nama_sparepart' => $request->nama_sparepart,
                        'stock' => $request->stock,
                        'status' => $request->status,
                    ];
                    Sparepart::where('id', $request->id_sp)->update($sparepart);
                    // return response()->json([
                    //     'success' => true,
                    //     'message'  => 'Sparepart berhasil ditambahkan.',
                    // ], 200);
                    Session::flash('success', 'Sparepart berhasil diubah.');
                    return response()->json(['success' => true], 200);
                } catch(Exception $e) {
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
        $armada = Sparepart::findOrFail($id);
        $armada->delete();
        Session::flash('success', 'Sparepart berhasil dihapus.');
        return response()->json(['success' => true], 200);
    }

    public function riwayatSparepart()
    {
        $data = Sparepart::select('spareparts.nama_sparepart', 'spareparts.id', 'spareparts.kode_sparepart', 'spareparts.stock', DB::raw('COUNT(perbaikan_has_spareparts.sparepart_id) as total_used'))
                ->leftJoin('perbaikan_has_spareparts', 'spareparts.id', '=', 'perbaikan_has_spareparts.sparepart_id')
                ->leftJoin('perbaikans', 'perbaikan_has_spareparts.perbaikan_id', '=', 'perbaikans.id')
                ->groupBy('spareparts.id', 'spareparts.nama_sparepart', 'spareparts.kode_sparepart', 'spareparts.stock')
                ->orderBy('total_used', 'DESC')
                ->get();

        return view('kepala_gudang.riwayat-sparepart', compact('data'));
    }

    public function exportXlsx()
    {
        $sparepart = Sparepart::all();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No.');
        $sheet->setCellValue('B1', 'Kode Sparepart');
        $sheet->setCellValue('C1', 'Nama Sparepart');
        $sheet->setCellValue('D1', 'Harga');
        $sheet->setCellValue('E1', 'Stock');
        $sheet->setCellValue('F1', 'Status');
        $sheet->setCellValue('G1', 'Keterangan');
        
        $column = 2;
        foreach ($sparepart as $key => $value) {
            $sheet->setCellValue('A'.$column, ($key+1));
            $sheet->setCellValue('B'.$column, $value->kode_sparepart);
            $sheet->setCellValue('C'.$column, $value->nama_sparepart);
            $sheet->setCellValue('D'.$column, $value->harga);
            $sheet->setCellValue('E'.$column, $value->stock);
            $sheet->setCellValue('F'.$column, $value->status);
            $sheet->setCellValue('G'.$column, $value->keterangan);
            $column ++;
        }

        $sheet->getStyle('A1:G1')->getFont()->setBold(true);
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=sparepart.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function detailRiwayatSparepart($id)
    {
        $sparepart = Sparepart::findOrFail($id);
        $spareparts = Perbaikan::select('perbaikans.tanggal', 'armadas.no_lambung', 'perbaikans.id')
                ->leftJoin('armadas', 'perbaikans.id_armada', '=', 'armadas.id')
                ->leftJoin('perbaikan_has_spareparts', 'perbaikans.id', '=', 'perbaikan_has_spareparts.perbaikan_id')
                ->where('perbaikan_has_spareparts.sparepart_id', $id)
                ->get();

        return view('kepala_gudang.detail-riwayat-sparepart', compact('spareparts', 'sparepart'));
    }
}
