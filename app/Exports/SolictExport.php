<?php

namespace App\Exports;

use App\Models\Solicitudot;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SolictExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Solicitudot::select("idsolicitudOT", "solicitante", "nombrE")
        ->join('estado',"estado.idestado", "=" , "solicitudot.idEstado")
        ->get();
    }


    public function headings(): array
    {
        return ["ID", "SOLICITANTE", "ESTADO"];
    }
}
