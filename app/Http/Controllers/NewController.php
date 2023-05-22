<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Criticidad;
use App\Models\Encargado;
use App\Models\Especialidad;
use App\Models\TTrabajo;
use App\Models\Ubicacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-ot|crear-ot|editar-ot|anular-ot', ['only' => ['index']]);
        $this->middleware('permission:crear-ot ', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-ot ', ['only' => ['edit', 'update']]);
        $this->middleware('permission:anular-ot ', ['only' => ['destroy']]);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
