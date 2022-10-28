<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Modelo;
use App\Http\Requests\StoreModeloRequest;
use App\Http\Requests\UpdateModeloRequest;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $modelo= Modelo::all();
        try {
            if (! $modelo) {
                return response()->json(['error' => 'error de conexión'], 500);
            }
        } catch (Throwable $e) {
            session()->flash('danger', 'Ocurrió un error al imprimir' . $e->getMessage());

            return response()->json(['error' => 'Ocurrió un error'. $e->getMessage()],  $e->getCode());
        }
        return response()->json(compact('modelo'));
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
     * @param  \App\Http\Requests\StoreModeloRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModeloRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $modelo= Modelo::where('marca_id', $id)->get();
        try {
            if (! $modelo) {
                return response()->json(['error' => 'error de conexión'], 500);
            }
        } catch (Throwable $e) {
            session()->flash('danger', 'Ocurrió un error al imprimir' . $e->getMessage());

            return response()->json(['error' => 'Ocurrió un error'. $e->getMessage()],  $e->getCode());
        }
        return response()->json(compact('modelo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function edit(Modelo $modelo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateModeloRequest  $request
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModeloRequest $request, Modelo $modelo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modelo $modelo)
    {
        //
    }
}
