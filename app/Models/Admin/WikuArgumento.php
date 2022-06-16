<?php

namespace App\Models\Admin;

use App\Models\PQR\tipoPQR;
use App\Models\Tutela\Submotivotutela;
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
        return $this->belongsTo(WikuAutorInst::class, 'wikuautorinstitu_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function autor()
    {
        return $this->belongsTo(WikuAutor::class, 'wikuautores_id', 'id');
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
        return $this->hasMany(WikuAsociacionArg::class, 'wiku_argumento_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function tipopqr()
    {
        return $this->belongsToMany(tipoPQR::class, 'wikuargasociaciones', 'tipo_p_q_r_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function asociacion_submotivotutelas()
    {
        return $this->belongsToMany(Submotivotutela::class, 'asociacionwikuargumentotutelas','wiku_argumento_id', 'submotivotutela_id');
    }
    //----------------------------------------------------------------------------------
}
