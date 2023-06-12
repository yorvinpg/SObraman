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
//
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class OTController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:ver-ot|crear-ot|editar-ot|anular-ot', ['only' => ['index']]);
        $this->middleware('permission:crear-ot', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-ot', ['only' => ['edit', 'update']]);
        $this->middleware('permission:anular-ot', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $filtro = $request->get('ID');
        $filtroE = $request->get('enc');
        $filtroU = $request->get('ubi');
        $filtroA = $request->get('area');
        $filtroEs = $request->get('est');
        $filtroF = $request->get('fecha');

        $rr = Encargado::all();
        $TT = TTrabajo::all();
        $AA = Area::all();
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
        if (isset($filtroA) && !empty($filtroA)) {
            $solicitudes = $solicitudes
                ->where('solicitudot.idarea', 'like', '%' . $filtroA . '%');
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
        return view('entorno.ordentra.consulta', compact('solicitudes', 'est', 'UB', 'TT', 'AA', 'rr', 'filtro', 'filtroE', 'filtroU', 'filtroA', 'filtroEs', 'filtroF', 'tec'));
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


        return view('entorno.ordentra.nuevo', compact('areas', 'respon', 'tts', 'espes', 'crits', 'ubis', 'user', 'date'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required'
        ], [
            'email.required' => 'El campo email es obligatorio'
        ]);

        $entornos = new Solicitudot();
        $entornos->fecha = $request->get('fecha');
        // $entornos->fechaEntrega = $request->get('fechaE');
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
        $entornos->idTec = 1;
        $entornos->detallSP = 'vacio';
        $entornos->modu = $request->get('modulo');

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
        $sol = Solicitudot::findOrFail($id);
        $est = Estado::all();
        $tec = Tecnico::all();
        return view('entorno.ordentra.editar', compact('id', 'est', 'tec','sol'));
    }

    public function update(Request $request, $id)
    {
        $sol = Solicitudot::select($id);
        $sol->idEstado = $request->estado; // Asignar el valor seleccionado del select al estado de la solicitud OT
        $sol->idTec = $request->tecnico;
        $sol->detallSP = $request->input('detalle');
        $sol->fechaCierre = $request->input('fecha');
        $sol->fechaEntrega = $request->input('fechaE');
        $sol->obsFinal = $request->input('observacion');
        $sol->save();
        // $data = $request->only('idEstado', 'idTecnico', 'detalle');

        // $sol->update($data);
        return redirect()->route('entorno.index')->with('success', 'O.T actualizado correctamente');
    }

    public function destroy(Request $request, $id)
    {

        $solicitud = Solicitudot::find($id);
        if (!$solicitud) {
            return redirect()->route('entorno.index')->with('sucess', 'Solicitud no encontrada');
        }

        $solicitud->idEstado = 6;
        $solicitud->detallAnu = $request->input('detalle_anulado');
        $solicitud->fechaAnu = now();
        $solicitud->save();

        return redirect()->route('entorno.anulado')->with('success', 'Anulado exitosamente');
    }

    // $solicitud = Solicitudot::find($id); // cambiar  a estado anulado  6 = Anulado -> ojo
    // if (!$solicitud) {
    //     return redirect()->route('entorno.index')->with('sucess', 'Solicitud no encontrada');
    // }

    // $solicitud->idEstado = 6;
    // $solicitud->save();

    // return redirect()->route('entorno.anulado')->with('success', 'Anulado exitosamente');
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
