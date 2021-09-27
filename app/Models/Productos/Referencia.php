<?php

namespace App\Models\Productos;

use App\Models\Admin\WikuAsociacion;
use App\Models\PQR\PQR;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Referencia extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'referencias';
    protected $guarded = [];

    //----------------------------------------------------------------------------------
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function pqrs()
    {
        return $this->hasMany(PQR::class, 'referencia_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function asociacion_normas()
    {
        return $this->hasMany(WikuAsociacion::class, 'referencia_id', 'id');
    }
}
