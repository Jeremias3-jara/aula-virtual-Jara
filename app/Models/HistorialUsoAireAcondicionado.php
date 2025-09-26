<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialUsoAireAcondicionado extends Model
{
    use HasFactory;

    protected $fillable = ['aire_id','docente_id','inicio','fin'];
}
