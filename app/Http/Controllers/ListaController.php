<?php

namespace App\Http\Controllers;

use App\Lista;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ListaController extends Controller
{

    public function index()
    {
        $listas = Lista::whereEstado(1)->select('id', 'etiqueta', 'padre', 'orden', 'estado')->get();
        return response()->json(['data' => $listas, 'msj' => 'data obtenida exitosamente', 'error' => false], 200);
    }



    public function store(Request $request)
    {
        $request->validate([
            'etiqueta' => 'required',
            'padre' => 'required',
            'orden' => 'required',
        ]);

        $lista = Lista::create($request->all());

        return response()->json(['data' => $lista, 'msj' => 'se ha creado exitosamente', 'error' => false], 200);
    }


    public function show($id)
    {
        $lista = Lista::whereEstado(1)->whereId($id)->first();
        return response()->json(['data' => $lista, 'msj' => 'data obtenida exitosamente', 'error' => false], 200);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'etiqueta' => 'required',
            'padre' => 'required',
            'orden' => 'required',
        ]);



        $lista = Lista::whereId($id)->whereEstado(1)->first();
        $msj = 'No se encontró coincidencias';

        if ($lista) {
            $lista->etiqueta = $request->etiqueta;
            $lista->padre = $request->padre;
            $lista->orden = $request->orden;
            $lista->save();

            $msj = 'Se ha actualizado exitosamente';
        }

        return response()->json(['data' => $lista, 'msj' => $msj, 'error' => false], 200);
    }

    public function destroy($id)
    {
        $lista = Lista::whereId($id)->whereEstado(1)->first();
        $msj = 'No se encontró coincidencias';

        if ($lista) {
            $lista->estado = 0;
            $lista->save();

            $msj = 'Se ha eliminado correctamente';
        }

        return response()->json(['data' => [], 'msj' => $msj, 'error' => false], 200);
    }
}
