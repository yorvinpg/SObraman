<?php

namespace App\Exports;

use App\Models\Solicitudot;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
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
        $data = Solicitudot::select("idsolicitudOT", "solicitante", "nom_E", "nom_ubi", "referencia", "fecha", "fechaEntrega", "fechaCierre", "nombrE", "tipoC", "nom_espe", "detalle", "detallSP")
            ->join('encargado', "encargado.idencargado", "=", "solicitudot.idEncarg")
            ->join('ubicacion', "ubicacion.idubicacion", "=", "solicitudot.idUbi")
            ->join('estado', "estado.idestado", "=", "solicitudot.idEstado")
            ->join('criticidad', "criticidad.idcriticidad", "solicitudot.idCriti")
            ->join('especialidad', "especialidad.idespecialidad", "=", "solicitudot.idEsp")
            ->get();

        //sdd($data);
        return $data;
    }


    public function headings(): array
    {
        return ["ID", "SOLICITANTE", "RESPONSABLE", "UBICACIÓN", "N° LOCAL/CLIENTE", "FECHA", "FECHA_ENTREGA" , "FECHA_CIERRE", "ESTADO", "CRITICIDAD", "ESPECIALIDAD", "DETALLE", "DETALLE_SOLUCION"];
    }
}
