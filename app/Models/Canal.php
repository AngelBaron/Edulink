<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Canal extends Model
{
    protected $fillable = [
        'maestro_id',
    ];

    public function maestro()
    {
        return $this->belongsTo(Maestro::class);
    }

    public function avisos()
    {
        return $this->hasMany(Aviso::class);
    }
}
