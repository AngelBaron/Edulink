<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'ubicacion',
        'maestro_id',
        'file_name',
    ];

    public function maestro()
    {
        return $this->belongsTo(Maestro::class, 'maestro_id');
    }
    
}
