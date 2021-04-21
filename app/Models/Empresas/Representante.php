<?php

namespace App\Models\Empresas;

use App\Models\Admin\Tipo_Docu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Representante extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'representantes';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'id');
    }
    //----------------------------------------------------------------------------------
    public function tipos_docu()
    {
        return $this->belongsTo(Tipo_Docu::class, 'docutipos_id', 'id');
    }
}
