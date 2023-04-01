<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Criticidad;
use App\Models\Especialidad;
use App\Models\Solicitudot;
use App\Models\TTrabajo;
use App\Models\Ubicacion;
use App\Models\User;
use Illuminate\Http\Request;

class OTController extends Controller
{

    public function index()
    {
        $solicitudes = Solicitudot::paginate(5); // te trae todo la data de solicitud

        return view('entorno.consulta', compact('solicitudes'));
    }


    public function create()
    {
        $areas = Area::all();
        $tts = TTrabajo::all();
        $espes = Especialidad::all();
        $crits = Criticidad::all();
        $ubis =  Ubicacion::all();
        $user = User::all();

        return view('entorno.nuevo', compact('areas', 'tts', 'espes', 'crits', 'ubis', 'user'));
    }

    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
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
}
