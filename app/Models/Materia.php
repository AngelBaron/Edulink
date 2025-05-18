<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = ['name', 'maestro_id'];

    public function maestro()
    {
        return $this->belongsTo(Maestro::class);
    }

    public function calificacions()
    {
        return $this->hasMany(Calificacion::class);
    }
    public function alumnos()
    {
        return $this->belongsTo(Alumno::class);
    }
}
