<?php

namespace App\Models\Tutela;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ImpugnacionResuelveEstado extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'impugnacionresuelve_estado';
    protected $guarded = [];

    //----------------------------------------------------------------------------------
    public function resuelves()
    {
        return $this->hasMany(ImpugnacionResuelve::class, 'impugnacionresuelve_estado_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
