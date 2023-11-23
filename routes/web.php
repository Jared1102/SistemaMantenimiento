<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MuroController;
use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RutinasController;
use App\Http\Controllers\MantenimientosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('Index');

//Auth::routes();

Route::get('/login', [LoginController::class, 'index'])->name('LoginIndex'); //Mandar llamar formulario de logeo

Route::post('/login', [LoginController::class, 'store'])->name('LoginStore');

Route::get('/muro', [MuroController::class, 'index'])->name('MuroIndex');

Route::post('/logout', [LogoutController::class, 'store'])->name('LogoutStore');

//Vehículos
Route::get('/vehiculos', [VehiculosController::class, 'index'])->name('VehiculosIndex');

Route::get('/vehiculos/create', [VehiculosController::class, 'create'])->name('VehiculosCreate');

Route::post('/vehiculos', [VehiculosController::class, 'store'])->name('VehiculosStore');

Route::get('vehiculos/{vehiculo}/edit', [VehiculosController::class, 'edit'])->name('VehiculosEdit');

Route::patch('vehiculos/{vehiculo}', [VehiculosController::class, 'update'])->name('VehiculosUpdate');

Route::delete('vehiculos/{vehiculo}', [VehiculosController::class, 'destroy'])->name('VehiculosDestroy');

//Rutinas
Route::get('/rutinas', [RutinasController::class, 'index'])->name('RutinasIndex');

Route::get('/rutinas/create', [RutinasController::class, 'create'])->name('RutinasCreate');

Route::post('/rutinas', [RutinasController::class, 'store'])->name('RutinasStore');

Route::get('rutinas/{rutina}/edit', [RutinasController::class, 'edit'])->name('RutinasEdit');

Route::patch('rutinas/{rutina}', [RutinasController::class, 'update'])->name('RutinasUpdate');

Route::delete('rutinas/{rutina}', [RutinasController::class, 'destroy'])->name('RutinasDestroy');

//Mantenimientos
Route::get('/mantenimientos', [MantenimientosController::class, 'index'])->name('MantenimientosIndex');

Route::get('/mantenimientos/create', [MantenimientosController::class, 'create'])->name('MantenimientosCreate');

Route::post('/mantenimientos', [MantenimientosController::class, 'store'])->name('MantenimientosStore');

Route::get('mantenimientos/{rutina}/edit', [MantenimientosController::class, 'edit'])->name('MantenimientosEdit');

Route::patch('mantenimientos/{rutina}', [MantenimientosController::class, 'update'])->name('MantenimientosUpdate');

Route::delete('mantenimientos/{rutina}', [MantenimientosController::class, 'destroy'])->name('MantenimientosDestroy');