<?php

namespace App\Http\Controllers;

use App\Punto;
use Illuminate\Http\Request;

class PuntoController extends Controller
{
    public function index()
    {
        $puntos = Punto::whereEstado(1)->select('id', 'longitud', 'latitud', 'estado')->get();
        return response()->json(['data' => $puntos, 'msj' => 'data obtenida exitosamente', 'error' => false], 200);
    }



    public function store(Request $request)
    {
        $request->validate([
            'longitud' => 'required',
            'latitud' => 'required',
        ]);

        $punto = Punto::create($request->all());

        return response()->json(['data' => $punto, 'msj' => 'se ha creado exitosamente', 'error' => false], 200);
    }


    public function show($id)
    {
        $punto = Punto::whereEstado(1)->whereId($id)->first();
        return response()->json(['data' => $punto, 'msj' => 'data obtenida exitosamente', 'error' => false], 200);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'latitud' => 'required',
            'longitud' => 'required'
        ]);



        $punto = Punto::whereId($id)->whereEstado(1)->first();
        $msj = 'No se encontró coincidencias';

        if ($punto) {
            $punto->latitud = $request->latitud;
            $punto->longitud = $request->longitud;
            $punto->save();

            $msj = 'Se ha actualizado exitosamente';
        }

        return response()->json(['data' => $punto, 'msj' => $msj, 'error' => false], 200);
    }

    public function destroy($id)
    {
        $punto = Punto::whereId($id)->whereEstado(1)->first();
        $msj = 'No se encontró coincidencias';

        if ($punto) {
            $punto->estado = 0;
            $punto->save();

            $msj = 'Se ha eliminado correctamente';
        }

        return response()->json(['data' => [], 'msj' => $msj, 'error' => false], 200);
    }
}
