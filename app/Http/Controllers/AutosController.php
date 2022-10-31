<?php

namespace App\Http\Controllers;

use JWTAuth;
use Throwable;
use App\Models\Autos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreAutosRequest;
use App\Http\Requests\UpdateAutosRequest;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class AutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //
         $auto= Autos::all();
         try {
             if (! $auto) {
                 return response()->json(['error' => 'error de conexión'], 500);
             }
         } catch (Throwable $e) {
             session()->flash('danger', 'Ocurrió un error al imprimir' . $e->getMessage());
 
             return response()->json(['error' => 'Ocurrió un error'. $e->getMessage()],  $e->getCode());
         }
         return response()->json(compact('auto'));
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
     * @param  \App\Http\Requests\StoreAutosRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreAutosRequest $request)
    public function store(Request $request)
    { 
        //return 23;
         //dd("llegando a jwt"); 
        // dd($request); 
       // dd("fffff Request fffff:  ", $request); 
        try {
          // dd( $request->fotografia->getClientOriginalName());
            return response()->json($request->fotografia->storeAs('public', $request->fotografia->getClientOriginalName()));
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
        //
       // dd("fffff StoreAutosRequest fffff:  ", $request);
        
        Log::info($request);


        $auto = Autos::create([
            'marca' => $request->post('marca'),
            'modelo' => $request->post('modelo'),
            'anio' => $request->post('anio'),
            'precio' => $request->post('precio'),
            'kilometraje' => $request->post('kilometraje'),
            'color' => $request->post('color'),
            'email' => $request->post('email'),
            'telefono' => $request->post('telefono'),
            'fotografia' => $request->post('fotografia'),
            'ruta' => $request->post('ruta')
        ]);

        
        return response()->json(compact('auto'),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autos  $autos
     * @return \Illuminate\Http\Response
     */
    public function show(Autos $autos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Autos  $autos
     * @return \Illuminate\Http\Response
     */
    public function edit(Autos $autos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAutosRequest  $request
     * @param  \App\Models\Autos  $autos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAutosRequest $request, Autos $autos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Autos  $autos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autos $autos)
    {
        //
    }
}
