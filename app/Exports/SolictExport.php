<?php

namespace App\Exports;

use App\Models\Solicitudot;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SolictExport implements FromCollection, WithHeadings, ShouldAutoSize, FromQuery
{
    protected $filtro;
    protected $filtroE;
    protected $filtroU;

    public function __construct($filtro, $filtroE, $filtroU)
    {
        $this->filtro = $filtro;
        $this->filtroE = $filtroE;
        $this->filtroU = $filtroU;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection():Collection
    {

        return $this->filtroE->getCollection();
        // return Solicitudot::select("idsolicitudOT", "solicitante", "nombrE")
        //     ->join('estado', "estado.idestado", "=", "solicitudot.idEstado")
        //     ->get();
    }

    public function query()
    {
        return Solicitudot::orderBy('idsolicitudOT', 'desc')
            ->join('ubicacion', "ubicacion.idubicacion", "=", "solicitudot.idUbi")
            ->join('encargado', "encargado.idencargado", "=", "solicitudot.idEncarg")
            ->when($this->filtro, function ($query, $filtro) {
                return $query->where('idsolicitudOT', '=', $filtro);
            })
            ->when($this->filtroE, function ($query, $filtroE) {
                return $query->where('encargado.nom_E', 'like', '%' . $filtroE . '%');
            })
            ->when($this->filtroU, function ($query, $filtroU) {
                return $query->where('ubicacion.nom_ubi', 'like', '%' . $filtroU . '%');
            });
    }

    public function headings(): array
    {
        return ["ID", "SOLICITANTE", "ESTADO"];
    }
}
