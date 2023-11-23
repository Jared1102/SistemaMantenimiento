<?php

namespace App\Http\Controllers;
use App\Models\Rutina;
use Illuminate\Http\Request;

class RutinasController extends Controller
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
        $rutinas = Rutina::paginate(5);
        return view('rutinas.index', ['rutinas'=>$rutinas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rutinas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required'
        ]);

        $rutina = Rutina::create([
            'descripcion' => $request->descripcion
        ]);

        session()->flash('status', 'Se guardó la rutina de mantenimiento '.$request->descripcion.' correctamente.');

        return to_route('RutinasIndex');
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
        $rutina = Rutina::find($id);
        return view('rutinas.edit', ['rutina'=>$rutina]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'descripcion' => 'required'
        ]);
        $rutina = Rutina::find($id);

        if($rutina) //Asignar valores a objeto con la información que viaja para posteriormente guardarla
        {
            $rutina->descripcion = $request->input('descripcion');
        }
        $rutina->save();

        session()->flash('status', 'Se actualizó la rutina de mantenimiento '.$request->descripion.' correctamente.');

        return to_route('RutinasIndex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rutina = Rutina::find($id);

        if($rutina) 
        {
            $rutina->delete();   
        }

        session()->flash('status', 'Se eliminó la rutina de mantenimiento correctamente.');

        return to_route('RutinasIndex');
    }
}
