<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\peliculas;
class PeliculasController extends Controller
{
    public function index()
    {
        $peliculas= peliculas::join('categorias', 'peliculas.id_pelicula','=','categorias.id_categoria')
        ->select('nombre', 'puntuacion', 'precio','categorias.nombre','categorias.recomendadas','categorias.genero','categorias.año')
        ->orderBy('categorias.nombre', 'asc')
        ->get();
        return[
            'pelicula'=>$peliculas
        ];
    }
    public function store(Request $request)
    
    {
        $peliculas = new peliculas();
        $peliculas->nombre= $request->nombre;
        $peliculas->pelCategoria= $request->pelCategoria;
        $peliculas->puntuacion= $request->puntuacion;
        $peliculas->precio= $request->precio;

        $peliculas->save();
    }

    public function update(Request $request)
    {
        $peliculas = peliculas::findOrFail($request->id_pelicula);
        $peliculas->nombre= $request->nombre;
        $peliculas->pelCategoria= $request->pelCategoria;
        $peliculas->puntuacion= $request->puntuacion;
        $peliculas->precio= $request->precio;
        
        $peliculas->save();
    }

    public function destroy(Request $request)
    {
        $peliculas = peliculas::findOrFail($request->id_pelicula);
        
        $peliculas->delete();
    }
}
