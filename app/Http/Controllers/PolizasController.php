<?php

namespace App\Http\Controllers;

use App\Models\Polizas;
use Illuminate\Http\Request;

class PolizasController extends Controller
{
    public function index()
    {
        $polizas = Polizas::with('cliente:id,name')->get();
        return response()->json($polizas);
    }


    public function show($id)
    {
        $poliza = Polizas::find($id);
        if ($poliza) {
            return response()->json($poliza);
        } else {
            return response()->json(['message' => 'No encontrado'], 404);
        }
    }

    public function destroy($id)
    {
        $poliza = Polizas::find($id);
        if ($poliza) {
            $poliza->delete();
            return response()->json(['message' => 'Eliminado correctamente']);
        } else {
            return response()->json(['message' => 'No encontrado'], 404);
        }
    }

    public function store(Request $request)
    {
        if ($request->id != 0) {
            $poliza = Polizas::find($request->id);
        } else {
            $poliza = new Polizas();
        }

        $poliza->total_horas = $request->total_horas;
        $poliza->fecha_inicio = $request->fecha_inicio;
        $poliza->fecha_fin = $request->fecha_fin;
        $poliza->precio = $request->precio;
        $poliza->id_cliente = $request->id_cliente;
        $poliza->observaciones = $request->observaciones;
        $poliza->save();

        return response()->json(['message' => 'Guardado correctamente']);
    }
}
