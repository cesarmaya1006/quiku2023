<?php

namespace App\Models\Empresas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Empresa extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'empresas';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function representante()
    {
        return $this->belongsTo(Representante::class, 'empresa_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
