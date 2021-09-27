<?php

namespace App\Models\Productos;

use App\Models\Admin\WikuAsociacion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Marca extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'marcas';
    protected $guarded = [];

    //----------------------------------------------------------------------------------
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function referencias()
    {
        return $this->hasMany(Referencia::class, 'marca_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function asociacion_normas()
    {
        return $this->hasMany(WikuAsociacion::class, 'marca_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
