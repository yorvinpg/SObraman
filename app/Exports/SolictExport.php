<?php

namespace App\Exports;

use App\Models\Solicitudot;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SolictExport implements FromCollection, WithHeadings, ShouldAutoSize
{

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection(): Collection
    {
        $data = Solicitudot::select("idsolicitudOT", "solicitante", "nom_E", "nom_ubi", "fecha", "nombrE")
            ->join('encargado', "encargado.idencargado", "=", "solicitudot.idEncarg")
            ->join('ubicacion', "ubicacion.idubicacion", "=", "solicitudot.idUbi")
            ->join('estado', "estado.idestado", "=", "solicitudot.idEstado")
            ->get()
            ->map(function ($item) {
                $item->fecha = Carbon::parse($item->fecha)->format('Y/m/d');
                return $item;
            });

        //sdd($data);
        return $data;
    }


    public function headings(): array
    {
        return ["ID", "SOLICITANTE", "RESPONSABLE", "UBICACIÓN", "FECHA", "ESTADO"];
    }
}
