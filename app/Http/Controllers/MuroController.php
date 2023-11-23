<?php

namespace App\Http\Controllers;

use App\Mail\MantenimientosProximosMail;
use App\Models\Mantenimiento;
use App\Models\Rutinas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Termwind\Components\Dd;

class MuroController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        //Enviar al correo
        
        $fechaActual = Carbon::now()->timezone('America/Mexico_City')->startOfDay();
        $mantenimientos=Mantenimiento::with('rutina','vehiculo')
            ->whereDate('fecha','>=',$fechaActual->toDateString())
            ->orderBy('fecha','asc')->get();
        $mantenimientos = $mantenimientos->map(function ($mantenimiento) use ($fechaActual) {
            $fechaActual = new \DateTime('now', new \DateTimeZone('America/Mexico_City'));
            $fechaActual->setTime(0,0,0);
            $fechaMantenimiento = new \DateTime($mantenimiento->fecha);
            // Calcula la diferencia en días
            $interval = $fechaActual->diff($fechaMantenimiento);
            $diasFaltantes = max(0, $interval->days);

            $mantenimiento->diasFaltantes = $diasFaltantes;
            return $mantenimiento;
        });

        $mantenimientosProximos = $mantenimientos->filter(function ($mantenimiento) {
            return $mantenimiento->diasFaltantes <= 28;
        });

        $usuarios=User::all();
        foreach ($usuarios as $usuario) {
            Mail::to($usuario->email)->send(new MantenimientosProximosMail($mantenimientosProximos));
        }
        
        //Mostrar en el dashboard
        $fechaActual = Carbon::now()->timezone('America/Mexico_City')->startOfDay();
        $mantenimientos=Mantenimiento::with('rutina','vehiculo')
            ->whereDate('fecha','>=',$fechaActual->toDateString())
            ->orderBy('fecha','asc')->get();
        

        foreach ($mantenimientos as $mantenimiento) {
            # code...
            
            $fechaMantenimiento = Carbon::parse($mantenimiento->fecha);
            // Calcula la diferencia en días

            $mantenimiento->diasFaltantes = $fechaActual->diffInDays($fechaMantenimiento);
        }
        return view('dashboard',['mantenimientos'=>$mantenimientos]);
    }

    public function enviarCorreoMantenimientos(){
        $mantenimientos=Mantenimiento::with('rutina','vehiculo')->orderBy('fecha','asc')->get();

        // Filtrar los mantenimientos que cumplen con la condición
        $mantenimientosProximos = $mantenimientos->filter(function ($mantenimiento) {
            return $mantenimiento->diasFaltantes <= 28;
        });

        $usuarios=User::all();
        foreach ($usuarios as $usuario) {
            Mail::to($usuario->email)->send(new MantenimientosProximosMail($mantenimientosProximos));
        }

        return "Correo enviado correctamente";
    }
}
