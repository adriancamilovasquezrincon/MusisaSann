<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clientes;
class ClientesController extends Controller
{
    public function index()
    {
        $cliente = clientes::orderBy('nombres','asc')
        ->where('nro_cliente','>=','50')
        ->get();
        return [
            'cliente'=> $cliente
        ];
    }
    public function store(Request $request)
    {
       $cliente = new clientes();
       $cliente->num_cedula= $request->num_cedula;
       $cliente->nombres= $request->nombres;
       $cliente->apellidos= $request->apellidos;
       $cliente->direccion= $request->direccion;
       $cliente->telefono= $request->telefono;
       $cliente->email= $request->email;
       $cliente->nro_cliente= $request->nro_cliente;
       $cliente->estado_prestamo= $request->estado_prestamo;
       $cliente->tipo_persona= $request->tipo_persona;

       $cliente->save();
    }
    public function update(Request $request)
    {
        $cliente = clientes::findOrFail($request->id_cliente);
        $cliente->num_cedula= $request->num_cedula;
        $cliente->nombres= $request->nombres;
        $cliente->apellidos= $request->apellidos;
        $cliente->direccion= $request->direccion;
        $cliente->telefono= $request->telefono;
        $cliente->email= $request->email;
        $cliente->nro_cliente= $request->nro_cliente;
        $cliente->estado_prestamo= $request->estado_prestamo;
        $cliente->tipo_persona= $request->tipo_persona;
 
        $cliente->save();
    }


    public function destroy(Request $request)
    {
        $cliente = clientes::findOrFail($request->id_cliente);
        
        $cliente->delete();
    }
}
