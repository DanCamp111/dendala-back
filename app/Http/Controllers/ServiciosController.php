<?php

namespace App\Http\Controllers;

use App\Models\Servicios;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function index()
    {
        return response()->json(Servicios::with(['cliente', 'tecnico', 'poliza', 'factura'])->get());
    }

    public function show($id)
    {
        $servicio = Servicios::with(['cliente', 'tecnico', 'poliza', 'factura'])->find($id);
        if (!$servicio) {
            return response()->json(['error' => 'Servicio no encontrado'], 404);
        }
        return response()->json($servicio);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required|exists:users,id',
            'id_tecnico' => 'required|exists:users,id',
            'fecha' => 'required|date',
            'horas' => 'required|numeric|min:0',
            'observaciones' => 'nullable|string',
            'id_poliza' => 'nullable|exists:polizas,id',
            'id_factura' => 'nullable|exists:facturas,id',
        ]);

        $servicio = Servicios::create($request->all());

        return response()->json(['message' => 'Servicio registrado correctamente', 'data' => $servicio], 201);
    }

    public function update(Request $request, $id)
    {
        $servicio = Servicios::find($id);
        if (!$servicio) {
            return response()->json(['error' => 'Servicio no encontrado'], 404);
        }

        $request->validate([
            'id_cliente' => 'required|exists:users,id',
            'id_tecnico' => 'required|exists:users,id',
            'fecha' => 'required|date',
            'horas' => 'required|numeric|min:0',
            'observaciones' => 'nullable|string',
            'id_poliza' => 'nullable|exists:polizas,id',
            'id_factura' => 'nullable|exists:facturas,id',
        ]);

        $servicio->update($request->all());

        return response()->json(['message' => 'Servicio actualizado correctamente', 'data' => $servicio]);
    }

    public function destroy($id)
    {
        $servicio = Servicios::find($id);
        if (!$servicio) {
            return response()->json(['error' => 'Servicio no encontrado'], 404);
        }

        $servicio->delete();
        return response()->json(['message' => 'Servicio eliminado correctamente']);
    }
}
