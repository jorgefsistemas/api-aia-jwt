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
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;


class AutosController extends Controller
{
    public $ruta;
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
        //dd($_FILES['fotografia']['name'], $_FILES['fotografia']['tmp_name']);
    //    dd($request->fotografia);
        $this->validate($request,[  'fotografia' => 'required|file|image|mimes:jpeg,png,gif,svg' ]); 
        //  $img = explode(";base64,", $request->fotografia);
               try {
          // dd( $request->fotografia->getClientOriginalName());
            // return response()->json($request->fotografia->storeAs('public', $request->fotografia->getClientOriginalName()));
            // return response()->json($request->fotografia->storeAs($request->fotografia->getClientOriginalName(), $request->fotografia->getClientOriginalFileName()));
           $this->ruta=$request->fotografia->storeAs('public', $_FILES['fotografia']['name']);
          // return response()->json($this->ruta);
        //   dd($this->ruta);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
        //
       // dd("fffff StoreAutosRequest fffff:  ", $request);
        
        Log::info($request);
        // dd($this->ruta);

        try {
           $auto = Autos::create([
            'marca' => $request->post('marca'),
            'modelo' => $request->post('modelo'),
            'anio' => $request->post('anio'),
            'precio' => $request->post('precio'),
            'kilometraje' => $request->post('kilometraje'),
            'color' => $request->post('color'),
            'email' => $request->post('email'),
            'telefono' => $request->post('telefono'),
            'fotografia' => 'foto',
            'ruta' => $this->ruta
        ]);  
        dd($auto);

         return response()->json(compact('auto'),201);
        }catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }

       

        
       
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
