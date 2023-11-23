<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mantenimiento;
use App\Models\Rutina;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\DB;

class MantenimientosController extends Controller
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
        // $mantenimientoVehiculos = Mantenimiento::with('Vehiculo:id,marca,modelo,anio,placas');
        // $mantenimientoRutinas = Mantenimiento::with('Rutina:id,descripcion');

        // $mantenimientos = array();

        // // Combinar la información de los dos arreglos
        // foreach ($mantenimientoVehiculos as $key => $value) {
        //     // Verificar si el índice existe en el segundo arreglo
        //     if (isset($mantenimientoRutinas[$key])) {
        //         // Combinar los dos arreglos en un nuevo arreglo
        //         $mantenimientos[] = array_merge($value, $mantenimientoRutinas[$key]);
        //     }
        // }
        //dd($mantenimientos); // ver que trae la variable
        $mantenimientos = DB::select('SELECT mantenimientos.id, rutinas.descripcion, vehiculos.marca, vehiculos.modelo, vehiculos.anio, vehiculos.placas, mantenimientos.fecha FROM rutinas, vehiculos, mantenimientos
        WHERE mantenimientos.vehiculos_id = vehiculos.id AND mantenimientos.rutinas_id = rutinas.id;');
        return view('mantenimientos.index', ['mantenimientos'=>$mantenimientos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rutinas = Rutina::all();
        $vehiculos = Vehiculo::all();
        return view('mantenimientos.create', ['rutinas'=>$rutinas], ['vehiculos'=>$vehiculos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rutina' => 'required | exists:rutinas,id',
            'vehiculo' => 'required | exists:vehiculos,id',
            'fecha' => 'required'
        ]);

        $mantenimiento = Mantenimiento::create([
            'fecha' => $request->fecha,
            'vehiculos_id' =>$request->vehiculo,
            'rutinas_id' => $request->rutina
        ]);

        session()->flash('status', 'Se guardó el mantenimiento correctamente.');

        return to_route('MantenimientosIndex'); 
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
        $mantenimiento = Mantenimiento::find($id);
        $rutinas=Rutina::all();
        $vehiculos=Vehiculo::all();
        return view('mantenimientos.edit', [
            'mantenimiento'=>$mantenimiento,
            'rutinas'=>$rutinas,
            'vehiculos'=>$vehiculos
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'rutina' => 'required | exists:rutinas,id',
            'vehiculo' => 'required | exists:vehiculos,id',
            'fecha' => 'required'
        ]);
        $mantenimiento = Mantenimiento::find($id);

        if($mantenimiento) //Asignar valores a objeto con la información que viaja para posteriormente guardarla
        {
            $mantenimiento->vehiculos_id = $request->input('vehiculo');
            $mantenimiento->rutinas_id = $request->input('rutina');
            $mantenimiento->fecha = $request->input('fecha');
        }
        $mantenimiento->save();

        session()->flash('status', 'Se actualizó el mantenimiento correctamente.');

        return to_route('MantenimientosIndex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mantenimiento = Mantenimiento::find($id);

        if($mantenimiento) 
        {
            $mantenimiento->delete();   
        }

        session()->flash('status', 'Se eliminó el mantenimiento correctamente.');

        return to_route('MantenimientosIndex');
    }
}
