<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{
    
    protected $fillable = [
        'canal_id',
        'titulo',
        'cuerpo',
        
    ];

    public function canal()
    {
        return $this->belongsTo(Canal::class);
    }
}
