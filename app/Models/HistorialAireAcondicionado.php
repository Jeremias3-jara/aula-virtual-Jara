<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialAireAcondicionado extends Model
{
    use HasFactory;

    protected $fillable = ['aire_id','temperatura','inicio','fin'];
}
