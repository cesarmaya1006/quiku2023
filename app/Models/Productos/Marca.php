<?php

namespace App\Models\Productos;

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
}
