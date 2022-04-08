<?php

namespace App\Models\Tutela;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Sentenciaseginstancia extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'sentenciaseginstancia';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function tutela()
    {
        return $this->hasOne(AutoAdmisorio::class, 'id');
    }
    //----------------------------------------------------------------------------------
    public function anexosSegundaInstancia()
    {
        return $this->hasMany(Anexosentenciaseg::class, 'sentenciaseginstancia_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function resuelvesSegundaInstancia()
    {
        return $this->hasMany(Resuelvesentenciaseg::class, 'sentenciaseginstancia_id', 'id');
    }
    //----------------------------------------------------------------------------------

}
