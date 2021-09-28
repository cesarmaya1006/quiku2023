<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuArgumento extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'wikuargumentos';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function autorInst()
    {
        return $this->hasMany(WikuAutorInst::class, 'wikuautorinstitu_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function autor()
    {
        return $this->hasMany(WikuAutor::class, 'wikuautores_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function temaEspecifico()
    {
        return $this->belongsTo(WikuTemaEspecifico::class, 'wikutemaespecifico_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function criterios()
    {
        return $this->hasMany(WikuArgCriterio::class, 'argumento_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function palabras()
    {
        return $this->belongsToMany(WikuPalabras::class, 'wikupalabrasargumentos');
    }
    //----------------------------------------------------------------------------------
    public function asociaciones()
    {
        return $this->hasMany(WikuAsociacionArg::class, 'wikuargumento_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function tipopqr()
    {
        return $this->belongsToMany(tipoPQR::class, 'wikuargasociaciones', 'tipo_p_q_r_id', 'id');
    }
}
