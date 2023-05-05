<?php

namespace App\Http\Controllers;

use App\Exports\SolictExport;
use App\Models\Area;
use App\Models\Criticidad;
use App\Models\Encargado;
use App\Models\Especialidad;
use App\Models\Estado;
use App\Models\Solicitudot;
use App\Models\Tecnico;
use App\Models\TTrabajo;
use App\Models\Ubicacion;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OTController extends Controller
{

    public function index(Request $request)
    {
        $filtro = $request->get('ID');
        $filtroE = $request->get('enc');
        $filtroU = $request->get('ubi');
        $filtroT = $request->get('ttrabajo');
        $filtroEs = $request->get('est');
        $filtroF = $request->get('fecha');

        $rr = Encargado::all();
        $TT = TTrabajo::all();
        $UB = Ubicacion::all();
        $est = Estado::all();
        $tec = Tecnico::all();

        $solicitudes = Solicitudot::orderBy('idsolicitudOT', 'desc')
            ->whereNotIn('idEstado', [6]); // te trae todo la data de solicitud en 5, de manera descendente, te muestra todo menos los anulados.

        //si devuelve null te muestra toda la data completa pero si no solo te muestra lo filtrado.
        if (isset($filtro) && !empty($filtro)) {
            $solicitudes = $solicitudes->where('idsolicitudOT', "=", $filtro);
        }

        if (isset($filtroE) && !empty($filtroE)) {
            $solicitudes = $solicitudes
                ->where('solicitudot.idEncarg', 'like', '%' . $filtroE . '%');
        }
        // ->join('encargado', "encargado.idencargado", "=", "solicitudot.idEncarg")

        if (isset($filtroU) && !empty($filtroU)) {
            $solicitudes = $solicitudes
                ->where('solicitudot.idUbi', 'like', '%' . $filtroU . '%');
        }
        // ->join('ubicacion', "ubicacion.idubicacion", "=", "solicitudot.idUbi")
        if (isset($filtroT) && !empty($filtroT)) {
            $solicitudes = $solicitudes
                ->where('solicitudot.idTipo', 'like', '%' . $filtroT . '%');
        }
        // ->join('t_trabajo', "t_trabajo.idtrabajo", "=", "solicitudot.idTipo")

        if (isset($filtroEs) && !empty($filtroEs)) {
            $solicitudes = $solicitudes
                ->where('solicitudot.idEstado', 'like', '%' . $filtroEs . '%');
        }

        if (isset($filtroF)) {
            if (!empty($filtroF)) {
                $solicitudes = $solicitudes
                    ->whereDate('fecha', 'like', '%' . $filtroF . '%');
            }
        } else {
            $solicitudes; // Si el filtro no está seteado, no se aplica ninguna restricción y se muestra la tabla completa
        }

        $solicitudes = $solicitudes->paginate(5);
        // te trae todo la data de solicitud en 5, de manera descendente
        return view('entorno.consulta', compact('solicitudes', 'est', 'UB', 'TT', 'rr', 'filtro', 'filtroE', 'filtroU', 'filtroT', 'filtroEs', 'filtroF', 'tec'));
    }

    public function create()
    {
        // Primero obtenemos la información del usuario que está autentificado...
        $user = Auth::user();
        // Para obtener el ID:
        $user->id;
        $areas = Area::all();
        $respon = Encargado::all();
        $tts = TTrabajo::all();
        $espes = Especialidad::all();
        $crits = Criticidad::all();
        $ubis =  Ubicacion::all();
        //mostrar solo la hora
        $date = Carbon::now();
        $date = $date->format('Y-m-d');


        return view('entorno.nuevo', compact('areas', 'respon', 'tts', 'espes', 'crits', 'ubis', 'user', 'date'));
    }

    public function store(Request $request)
    {
        $entornos = new Solicitudot();
        $entornos->fecha = $request->get('fecha');
        $entornos->solicitante = $request->get('solicitante');
        $entornos->email = $request->get('email');
        $entornos->telefono = $request->get('telefono');
        $entornos->idTipo = $request->get('tt');
        $entornos->idEsp = $request->get('esp');
        $entornos->idCriti = $request->get('crit');
        $entornos->idUbi = $request->get('ubi');
        $entornos->referencia = $request->get('referencia');
        $entornos->descripcion = $request->get('descripcion');
        $entornos->detalle = $request->get('detalle');
        $entornos->idEstado = 1;
        $entornos->idArea = $request->get('area');
        $entornos->idEncarg = $request->get('responsable');
        $entornos->idTec = 4;
        $entornos->detallSP = 'vacio';

        $entornos->save();
        return redirect()->route('entorno.index')->with('success', 'OT creado exitosamente');
    }
    public function show($id)
    {
        $sol = Solicitudot::findOrFail($id);
        return view('entorno.show', compact('sol'));
    }
    public function edit(Solicitudot $id)
    {
        $est = Estado::all();
        $tec = Tecnico::all();
        return view('entorno.editar', compact('id', 'est', 'tec'));
    }

    public function update(Request $request, $tem)
    {
        $sol = Solicitudot::findOrFail($tem);
        $sol->idEstado = $request->estado; // Asignar el valor seleccionado del select al estado de la solicitud OT
        $sol->idTec = $request->tecnico;
        $sol->detallSP = $request->input('detalle');
        if (trim($request->tecnico)=='') {
            # code...
            $sol=$request->except('tecnico');
        }else {
            # code...
            $sol->save();
        }
        $sol->save();
        // $data = $request->only('idEstado', 'idTecnico', 'detalle');

        // $sol->update($data);
        return redirect()->route('entorno.index')->with('success', 'O.T actualizado correctamente');
    }

    public function destroy($id)
    {
    
        $solicitud = Solicitudot::find($id); // cambiar  a estado anulado  6 = Anulado -> ojo
        if (!$solicitud) {
            return redirect()->route('entorno.index')->with('sucess', 'Solicitud no encontrada');
        }
        $solicitud->idEstado = 6;
        $solicitud->save();

        return redirect()->route('entorno.anulado')->with('success', 'Anulado exitosamente');
    }

    public function exportExcel(Request $request)
    {

        // Descargar el archivo Excel con un nombre y extensión específicos
        return Excel::download(new SolictExport, 'solicitudes.xlsx');
    }

    public function imprimirFactura()
    {
        // $solicit = Solicitudot::orderBy('idsolicitudOT', 'desc')
        //     ->whereNotIn('idEstado', [6]); // Puedes pasar datos a tu vista si los necesitas
        // $pdf = PDF::loadView('factura', $solicit); // Crear el PDF usando la librería Dompdf

        // return response($pdf->output(), 200)
        //     ->header('Content-Type', 'application/pdf')
        //     ->header('Content-Disposition', 'attachment; filename=factura.pdf');
    }
}
