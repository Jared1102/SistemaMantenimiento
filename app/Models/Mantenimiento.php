<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    public function rutina()
    {
        return $this->belongsTo(Rutina::class,'rutinas_id');
    }
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class,'vehiculos_id');
    }
    protected $fillable = [
        'fecha',
        'vehiculos_id',
        'rutinas_id',
    ];
}
