<?php

namespace App\Http\Controllers;

use App\Models\Ganado;
use Illuminate\Http\Request;

class GanadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // $ganado = Ganado::all();
        $texto = $request->input('texto');
        $ganado = Ganado::query()
            ->where('nombre', 'LIKE', "%{$texto}%")
            ->get();
        return view('dashboard',compact('ganado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = request()->except('_token');
        Ganado::insert($datos);
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ganado  $ganado
     * @return \Illuminate\Http\Response
     */
    public function show(Ganado $ganado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ganado  $ganado
     * @return \Illuminate\Http\Response
     */
    public function edit(Ganado $ganado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ganado  $ganado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Ganado = Ganado::find($id);
        $Ganado->nombre = $request->nombre;
        $Ganado->tipo = $request->tipo;
        $Ganado->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ganado  $ganado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ganado = Ganado::findOrFail($id);
        Ganado::destroy($id);
        return back();

    }
}
