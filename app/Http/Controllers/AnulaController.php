<?php

namespace App\Http\Controllers;

use App\Models\Solicitudot;
use Illuminate\Http\Request;

class AnulaController extends Controller
{

    public function index(Request $request)
    {
        $filtro = $request->get('ID');
        $anu = Solicitudot::orderBy('idsolicitudOT','desc')
        ->where('idEstado', [6]);// lista todo los anulados existentes en forma descendiente
        if (isset($filtro) && !empty($filtro)) {
            $anu = $anu->where('idsolicitudOT', "=", $filtro);
        }else{
            $anu = Solicitudot::orderBy('idsolicitudOT','desc')
            ->where('idEstado', [6]);
        }
        $anu = $anu->paginate(5);
        return view('entorno.anulado',compact('anu','filtro'));
    }


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
