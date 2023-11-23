<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mantenimiento;

class Vehiculo extends Model
{
    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class,'vehiculos_id');
    }
    protected $fillable = [
        'marca',
        'modelo',
        'anio',
        'placas'
    ];
}
