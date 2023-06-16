<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Notulensi;
use App\Exports\NotulensiExport;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Excel as ExcelExcel;

class ExportController extends Controller
{
    public function index()
    {
        return view('export.index');
    }

    public function exportexcel(Request $request)
    {
        $request->validate([
            'start_date'    =>  'bail|nullable|date',
            'end_date'      =>  'bail|nullable|date',
        ]);

        $start_date =   $request->start_date;
        $end_date   =   $request->end_date;

        $data = Notulensi::whereBetween('tgl_meeting', [$start_date, $end_date])
                ->select([
                    'tgl_meeting',
                    'section',
                    'subjek',
                    'task_id',
                    'progress',
                    'peserta',
                ])
                ->get([
                    'tgl_meeting',
                    'section',
                    'subjek',
                    'task_id',
                    'progress',
                    'peserta',
                ]);
        
                return Excel::download(new NotulensiExport($start_date, $end_date), 'Notulensi-export '.date('d-m-Y').'.xlsx', ExcelExcel::XLSX);
    }
}
