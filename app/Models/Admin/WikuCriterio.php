<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuCriterio extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'wikucriterios';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function normas()
    {
        return $this->belongsToMany(Rol::class, 'usuario_rol', 'usuario_id', 'rol_id');
    }
}
