<?php

namespace App\Models\Productos;

use App\Models\PQR\PQR;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Referencia extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'marcas';
    protected $guarded = [];

    //----------------------------------------------------------------------------------
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function pqrs()
    {
        return $this->hasMany(PQR::class, 'referencia_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
