<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth'); //Crear constructor solo cuando pase por autentificación
    }

    public function index()
    {
        $vehiculos = Vehiculo::paginate(5);
        return view('vehiculos.index', ['vehiculos'=>$vehiculos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'anio' => ['required', 'integer'],
            'placas' => 'required'
        ]);

        $vehiculo = Vehiculo::create([
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'anio' => $request->anio,
            'placas' => $request->placas
        ]);

        session()->flash('status', 'Se guardó el vehículo '.$request->marca.' '.$request->modelo.' correctamente.');

        return to_route('VehiculosIndex');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vehiculo = Vehiculo::find($id);
        return view('vehiculos.edit', ['vehiculo'=>$vehiculo]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'anio' => ['required', 'numeric'],
            'placas' => 'required'
        ]);
        $vehiculo = Vehiculo::find($id);

        if($vehiculo) //Asignar valores a objeto con la información que viaja para posteriormente guardarla
        {
            $vehiculo->marca = $request->input('marca');
            $vehiculo->modelo = $request->input('modelo');
            $vehiculo->anio = $request->input('anio');
            $vehiculo->placas = $request->input('placas');
        }
        $vehiculo->save();

        session()->flash('status', 'Se actualizó el vehículo '.$request->marca.' '.$request->modelo.' correctamente.');

        return to_route('VehiculosIndex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehiculo = Vehiculo::find($id);

        if($vehiculo) 
        {
            $vehiculo->delete();   
        }

        session()->flash('status', 'Se eliminó el vehículo correctamente.');

        return to_route('VehiculosIndex');
    }
}
