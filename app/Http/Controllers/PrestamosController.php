<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\prestamos;
class PrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamos= prestamos::join('clientes', 'prestamos.id_prestamo','=','clientes.id_cliente', 'peliculas', 'prestamos.id_prestamo', 'peliculas.id_pelicula' )
        ->select('fecha_prestada', 'fecha_devolucion','estado_Pelicula','clientes.num_cedula','clientes.nombres','clientes.apellidos')
        ->select('fecha_prestada', 'fecha_devolucion','estado_Pelicula', 'peliculas.nombre','peliculas.puntuacion', 'peliculas.precio')
        ->orderBy('clientes.nombres', 'asc')
        ->orderBy('peliculas.nombre', 'asc')
        ->get();
        return[
            'prestamo'=>$prestamos
        ];
    }
    public function store(Request $request)
    
    {
        $prestamos = new prestamos();
        $prestamos->pres_cliente= $request->pres_cliente;
        $prestamos->pres_pelicula= $request->pres_pelicula;
        $prestamos->fecha_prestada= $request->fecha_prestada;
        $prestamos->fecha_devolucion= $request->fecha_devolucion;
        $prestamos->estadoPelicula= $request->estadoPelicula;
 
        $prestamos->save();
    }

    public function update(Request $request)
    {
        $prestamos = prestamos::findOrFail($request->id_prestamo);
        $prestamos->pres_cliente= $request->pres_cliente;
        $prestamos->pres_pelicula= $request->pres_pelicula;
        $prestamos->fecha_prestada= $request->fecha_prestada;
        $prestamos->fecha_devolucion= $request->fecha_devolucion;
        $prestamos->estadoPelicula= $request->estadoPelicula;
 
        $prestamos->save();
    }

    public function destroy(Request $request)
    {
        $prestamos = prestamos::findOrFail($request->id_prestamo);
        
        $prestamos->delete();
    }
}
