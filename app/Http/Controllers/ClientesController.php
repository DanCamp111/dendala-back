<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\New_;

class ClientesController extends Controller
{
    public function index()
    {
        return response()->json(Clientes::get());
    }


    public function client($id)
    {
        $cliente =   Clientes::find($id);
        return $cliente;
    }

    public function destroy($id)
    {
        $cliente = Clientes::find($id);
        if ($cliente) {
            $cliente->delete();
            return "Ok";
        } else {
            return "no encontrado";
        }
    }

    public function store(Request $request)
    {
        if ($request->id != 0) {
            $cliente = Clientes::find($request->id);
        } else {
            $cliente = new Clientes();
        }
        $cliente->name = $request->name;
        $cliente->email = $request->email;
        $cliente->password = Hash::make($request->password);
        $cliente->rfc = $request->rfc;
        $cliente->contacto = $request->contacto;
        $cliente->telefono_contacto = $request->telefono_contacto;
        $cliente->direccion = $request->direccion;
        $cliente->rol = "C";
        $cliente->save();

        return "Ok";
    }

    public function indexTecnicos()
    {
        return response()->json(Clientes::where('rol', 'T')->get());
    }

    public function tecnic($id)
    {
        $tecnico = Clientes::where('rol', 'T')->find($id);
        return $tecnico;
    }

    public function storeTecnico(Request $request)
    {
        $tecnico = new Clientes();
        $tecnico->name = $request->name;
        $tecnico->email = $request->email;
        $tecnico->password = Hash::make($request->password);
        $tecnico->rfc = $request->rfc;
        $tecnico->contacto = $request->contacto;
        $tecnico->telefono_contacto = $request->telefono_contacto;
        $tecnico->direccion = $request->direccion;
        $tecnico->rol = "T";
        $tecnico->save();

        return response()->json(['message' => 'Técnico registrado correctamente']);
    }

    public function deleteTecnico($id)
    {
        $tecnico = Clientes::where('id', $id)->where('rol', 'T')->first();
        if ($tecnico) {
            $tecnico->delete();
            return response()->json(['message' => 'Técnico eliminado correctamente']);
        }
        return response()->json(['error' => 'Técnico no encontrado'], 404);
    }
}
