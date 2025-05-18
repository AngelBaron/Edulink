<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumnos';

    public $timestamps = false;

    protected $fillable = ['user_id', 'maestro_id', 'nombre_hijo', 'apaterno_hijo', 'amaterno_hijo'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function calificacions()
    {
        return $this->hasMany(Calificacion::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
