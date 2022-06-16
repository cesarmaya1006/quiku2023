<?php

namespace App\Models\Admin;

use App\Models\PQR\tipoPQR;
use App\Models\Tutela\Submotivotutela;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuNorma extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'wikunormas';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function documento()
    {
        return $this->belongsTo(WikuDocument::class, 'fuente_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function temaEspecifico()
    {
        return $this->belongsTo(WikuTemaEspecifico::class, 'wikutemaespecifico_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function criterios()
    {
        return $this->hasMany(WikuCriterio::class, 'norma_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function palabras()
    {
        return $this->belongsToMany(WikuPalabras::class, 'wikupalabrasnormas');
    }
    //----------------------------------------------------------------------------------
    public function asociaciones()
    {
        return $this->hasMany(WikuAsociacion::class, 'wiku_norma_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function tipopqr()
    {
        return $this->belongsToMany(tipoPQR::class, 'wikuasociaciones', 'tipo_p_q_r_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function asociacion_submotivotutelas()
    {
        return $this->belongsToMany(Submotivotutela::class, 'asociacionwikunormatutelas','wikunormas_id', 'submotivotutela_id');
    }
    //----------------------------------------------------------------------------------
}
