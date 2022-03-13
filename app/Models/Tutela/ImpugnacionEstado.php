<?php

namespace App\Models\Tutela;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ImpugnacionEstado extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'impugnacion_estado';
    protected $guarded = [];

    //----------------------------------------------------------------------------------
    public function impugnaciones()
    {
        return $this->hasMany(Impugnacion::class, 'impugnacion_estado_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
