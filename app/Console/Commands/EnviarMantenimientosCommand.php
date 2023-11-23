<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Mantenimiento;
use App\Models\User;
use App\Mail\MantenimientosProximosMail;
use Illuminate\Support\Facades\Mail;

class EnviarMantenimientosProximosCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'app:enviar-mantenimientos-proximos-command';
   

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envía correos electrónicos con los mantenimientos próximos al mediodía';
    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $mantenimientos=Mantenimiento::with('rutina','vehiculo')->orderBy('fecha','asc')->get();

        // Filtrar los mantenimientos que cumplen con la condición
        $mantenimientosProximos = $mantenimientos->filter(function ($mantenimiento) {
            return $mantenimiento->diasFaltantes <= 28;
        });

        $usuarios=User::all();
        foreach ($usuarios as $usuario) {
            Mail::to($usuario->email)->send(new MantenimientosProximosMail($mantenimientosProximos));
        }

        $this->info('Correo enviado correctamente');
    }
}
