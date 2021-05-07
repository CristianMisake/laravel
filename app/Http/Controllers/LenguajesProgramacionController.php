<?php

namespace App\Http\Controllers;

use App\LenguajesProgramacion;
use Illuminate\Http\Request;
use App;

class LenguajesProgramacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //vista principal
        $lenguajes = App\LenguajesProgramacion::all();

        return view('index', ['lenguajes' => $lenguajes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //guardar de base de datos un registro
        $nuevoLenguaje = new LenguajesProgramacion;
        $nuevoLenguaje->lenguaje = $request->input('lenguaje');
        $nuevoLenguaje->compilado = $request->input('compilado');
        $nuevoLenguaje->descripcion = $request->input('descripcion');
        $nuevoLenguaje->save();
        return redirect()->back()->with('exitoso', 'Se ha agregado un nuevo lenguaje de programación.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LenguajesProgramacion  $lenguajesProgramacion
     * @return \Illuminate\Http\Response
     */
    public function show(LenguajesProgramacion $lenguajesProgramacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LenguajesProgramacion  $lenguajesProgramacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //vista para edición
        $actualizarLenguaje = App\LenguajesProgramacion::findOrFail($id);
        return view('editar', compact('actualizarLenguaje'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LenguajesProgramacion  $lenguajesProgramacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //actualizar de base de datos un registro
        $lenguajeUpdate = \App\LenguajesProgramacion::findOrFail($id);
        $lenguajeUpdate->lenguaje = $request->input('lenguaje');
        $lenguajeUpdate->compilado = $request->input('compilado');
        $lenguajeUpdate->descripcion = $request->input('descripcion');
        $lenguajeUpdate->save();
        return redirect()->back()->with('editado', 'Se ha editado correctamente el lenguaje.');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LenguajesProgramacion  $lenguajesProgramacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //eliminar de base de datos un registro
        $lenguajeDestroy = \App\LenguajesProgramacion::findOrFail($id);
        $lenguajeDestroy->delete();
        return redirect()->back()->with('eliminado', 'Se ha eliminado correctamente el lenguaje.');   
    }
}
