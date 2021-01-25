<?php

namespace App\Http\Controllers;

use App\Models\Coche;
use App\Models\Marca;
use Illuminate\Http\Request;

class CocheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coches=Coche::orderBy('marca_id')->orderBy('modelo')->paginate(3);
        return view('coches.index', compact('coches'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas=Marca::orderBy('nombre')->get();
        return view('coches.create', compact('marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function show(Coche $coch)
    {
        return view('coches.show', compact('coch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function edit(Coche $coche)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coche $coche)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coche $coch)
    {
        $foto=basename($coch->foto);
        if($foto!='default.png'){
            unlink($coch->foto);
        }
        $coch->delete();
        return redirect()->route('coches.index')->with("mensaje", "¡¡ Coche Borrado !!");
    }
    //método para ver los coches de una marca determinada
    public function cochesxmarca(Marca $marca){
        $coches=Coche::where('marca_id', '=', $marca->id)->orderBy('modelo')->paginate(3);
        return view('coches.cochesxmarca', compact('coches'));

    }
}
