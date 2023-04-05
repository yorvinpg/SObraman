<?php

namespace App\Http\Controllers;

use App\Exports\SolictExport;
use App\Models\Area;
use App\Models\Criticidad;
use App\Models\Encargado;
use App\Models\Especialidad;
use App\Models\Solicitudot;
use App\Models\TTrabajo;
use App\Models\Ubicacion;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OTController extends Controller
{

    public function index()
    {
        $solicitudes = Solicitudot::orderBy('idsolicitudOT', 'desc')->paginate(5); // te trae todo la data de solicitud en 5, de manera descendente

        return view('entorno.consulta', compact('solicitudes'));
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

        $entornos->save();
        return redirect()->route('entorno.index');
    }
    public function show($id)
    {
        $sol = Solicitudot::findOrFail($id);
        return view('entorno.show', compact('sol'));
    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function exportExcel(){
     
        return Excel::download(new SolictExport, 'solicitud.xlsx');
    }
}
