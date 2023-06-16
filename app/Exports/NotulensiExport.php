<?php

namespace App\Exports;

use App\Models\Notulensi;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\DB;

class NotulensiExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;
    protected $params;

    public function __construct($start_date, $end_date)
    {
        $this->start_date   =   $start_date;
        $this->end_date     =   $end_date;
    }

    public function collection()
    {
        $query = "SELECT DATE(tgl_meeting) as tgl_meeting,
                    section,
                    subjek,
                    task_id,
                    progress,
                    peserta                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
                    FROM notulensi
                    WHERE DATE(tgl_meeting)
                    BETWEEN '$this->start_date' AND '$this->end_date'";

                    return collect(DB::select($query));
    }

    public function registerEvents(): array
    {
        return[
            AfterSheet::class   =>  function(AfterSheet $event) 
                                    {
                                        $cellRange  =   'A1:W1';
                                        $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(20);
                                    }
            ];        
    }
    public function headings(): array
    {
        return[
                'Tgl Meeting',
                'Section',
                'Subjek',
                'Task ID',
                'Progress',
                'Peserta',
        ];
    }

    public function map($row): array
    {   
        switch ($row->section) {
            case 'GAA':
                $row->section = 'General Affair';
                break;
            case 'LND':
                $row->section = 'Learning & Development';
                break;
            case 'PSN':
                $row->section = 'Personalia';
                break;
            case 'CSR':
                $row->section = 'CSR & HSE';
                break;
            case 'HRA':
                $row->section = 'HR Analytics';
                break;
            case 'REC':
                $row->section = 'Recruitment';
                break;
            default:
                $row->section = 'Tidak ada Data';
                break;
        }

        return[
            date('d-m-Y', strtotime($row->tgl_meeting)),
            $row->section,
            $row->subjek,
            $row->task_id,
            $row->progress,
            $row->peserta,
        ];
    }
}
