<?php

namespace App\Models\Productos;

use App\Models\Admin\WikuAsociacion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Producto extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'productos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function marcas()
    {
        return $this->hasMany(Marca::class, 'producto_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function asociacion_normas()
    {
        return $this->hasMany(WikuAsociacion::class, 'producto_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
