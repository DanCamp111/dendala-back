<?php

namespace App\Http\Controllers;

use App\Models\Facturas;
use Illuminate\Http\Request;

class FacturasController extends Controller
{
    public function index() {
        return response()->json(Facturas::with('cliente')->get());
    }

    public function store(Request $request) {
        $request->validate([
            'id_cliente' => 'required|exists:users,id',
            'fecha' => 'required|date',
            'monto' => 'required|numeric|min:0',
            'observaciones' => 'nullable|string',
        ]);

        $factura = Facturas::create($request->all());
        return response()->json(['message' => 'Factura creada', 'factura' => $factura]);
    }

    public function show($id)
    {
        $factura = Facturas::find($id);
        if ($factura) {
            return response()->json($factura);
        } else {
            return response()->json(['message' => 'No encontrado'], 404);
        }
    }

    public function update(Request $request, Facturas $factura) {
        $request->validate([
            'id_cliente' => 'required|exists:users,id',
            'fecha' => 'required|date',
            'monto' => 'required|numeric|min:0',
            'observaciones' => 'nullable|string',
        ]);

        $factura->update($request->all());
        return response()->json(['message' => 'Factura actualizada', 'factura' => $factura]);
    }

    public function destroy($id) {
        $factura = Facturas::find($id);
    
        if (!$factura) {
            return response()->json(['message' => 'Factura no encontrada'], 404);
        }
    
        $factura->delete();
    
        // Verificar si SoftDeletes está activado
        if (method_exists($factura, 'forceDelete')) {
            $factura->forceDelete();
        }
    
        return response()->json(['message' => 'Factura eliminada']);
    }
    
}

