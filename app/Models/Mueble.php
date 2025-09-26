<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mueble extends Model
{
    use HasFactory;

    protected $fillable = ['tipo','cantidad','aula_id'];

    public function aula(){ return $this->belongsTo(Aula::class); }
}
