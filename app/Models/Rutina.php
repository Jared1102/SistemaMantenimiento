<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mantenimiento;

class Rutina extends Model
{
    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class,'rutinas_id');
    }
    protected $fillable = [
        'descripcion'
    ];
}
