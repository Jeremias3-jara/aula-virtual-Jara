<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disponibilidad extends Model
{
    use HasFactory;

    // 🔧 Indicamos el nombre real de la tabla (ya que no sigue la convención plural)
    protected $table = 'disponibilidad';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'aula_id',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'disponible'
    ];

    // Relación con el modelo Aula
    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}
