<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'ubicacion',
        'file_name',
        'alumno_id',
        'tipo',
        'validado'
    ];

    public function Alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumno_id');
    }
}
