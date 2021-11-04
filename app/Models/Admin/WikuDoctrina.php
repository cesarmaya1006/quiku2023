<?php

namespace App\Models\Admin;

use App\Models\PQR\tipoPQR;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuDoctrina extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'wikudoctrinas';
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
        return $this->hasMany(WikuDocCritero::class, 'doctrina_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function palabras()
    {
        return $this->belongsToMany(WikuPalabras::class, 'wikupalabrasdoc');
    }
    //----------------------------------------------------------------------------------
    public function asociaciones()
    {
        return $this->hasMany(WikuAsociacionDoc::class, 'wiku_doctrina_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function tipopqr()
    {
        return $this->belongsToMany(tipoPQR::class, 'wikudocasociaciones', 'tipo_p_q_r_id', 'id');
    }
}
