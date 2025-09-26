<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = ['aula_id','materia_id','docente_id','horario_id','fecha'];

    public function aula(){ return $this->belongsTo(Aula::class); }
    public function materia(){ return $this->belongsTo(Materia::class); }
    public function docente(){ return $this->belongsTo(Docente::class); }
    public function horario(){ return $this->belongsTo(Horario::class); }
}
