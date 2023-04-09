<?php

namespace App\Http\Controllers;

use App\Models\Encargado;
use App\Models\Solicitudot;
use Illuminate\Http\Request;

class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderC = Solicitudot::orderBy('idsolicitudOT', 'desc')
            ->where('idEstado', '5')
            ->get();

        $orderP = Solicitudot::orderBy('idsolicitudOT', 'desc')
            ->where('idEstado', '2')
            ->get();

        $total = Solicitudot::count();
        $count = Solicitudot::count(); // te trae todo la data de solicitud en 5, de manera descendente
        $countA = Solicitudot::where('idEstado', '6')
            ->count();

        $countP = Solicitudot::where('idEstado', '2')
            ->count();
        if ($total > 0) {
            $porcentaje =   floor(($countP / $total) * 100);
        } else {
            $porcentaje = 0;
        }

        $countC = Solicitudot::where('idEstado', '5')
            ->count();
        if ($total > 0) {
            $porcentajeC =   floor(($countC / $total) * 100);
        } else {
            $porcentajeC = 0;
        }
        return view('entorno.Dash', compact('orderC', 'orderP', 'count', 'countA', 'porcentaje', 'porcentajeC'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
