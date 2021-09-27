<?php

namespace App\Models\Productos;

use App\Models\Admin\WikuAsociacion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Categoria extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'categorias';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function asociacion_norma()
    {
        return $this->hasMany(WikuAsociacion::class, 'categoria_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
