<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disponibilidad extends Model
{
    use HasFactory;

    protected $fillable = ['aula_id','fecha','hora_inicio','hora_fin','disponible'];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}
