<?php

namespace App\Http\Controllers;

use App\Models\Solicitudot;
use Illuminate\Http\Request;

class OTController extends Controller
{

    public function index()
    {
        $solicitudes = Solicitudot::paginate(5); // te trae todo la data de solicitud

        return view('entorno.index', compact('solicitudes'));
    }


    public function create()
    {
        return view('entorno.nuevo');
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
