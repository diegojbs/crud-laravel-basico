<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;
use App\Autor;
use DB;
use App\Libro;



class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::all();

        // dd($libros[0]->autor->name_autor);
        return view('libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estado="A";    

        $categorias = Categoria::orderBy('name_categoria', 'desc')->pluck('name_categoria', 'id');
        $autores = Autor::orderBy('name_autor', 'desc')->pluck('name_autor', 'id');

                             
        return view('libros.create',compact('categorias','autores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());  
        $libro = new Libro();
        $libro->name = $request->name;
        $libro->prize = $request->price;
        $libro->categoria_id = $request->categoria_id;
        $libro->autor_id = $request->autor_id;
        
        $libro->save();
        return redirect()->route('libro.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libro = Libro::find($id);
        $libro->categoria;
        $libro->autor;
        // dd($libro->categoria);
        $categorias = Categoria::orderBy('name_categoria', 'desc')->pluck('name_categoria', 'id');
        $autores = Autor::orderBy('name_autor', 'desc')->pluck('name_autor', 'id');
        // dd($libro);
        return view ('libros.edit', ['libro'=>$libro, 'categorias'=>$categorias, 'autores'=>$autores]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // DD($request->all());
        $libro = Libro::find($id);
        $libro->name = $request->name;
        $libro->prize = $request->price;
        $libro->categoria_id = $request->categoria_id;
        $libro->autor_id = $request->autor_id;
        // dd($libro);
        $libro->save();

        return redirect()->route('libro.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libro = LIbro::find($id);
        $libro->delete();

        return redirect()->route('libro.index');
    }
}
