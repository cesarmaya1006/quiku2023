<?php

namespace App\Models\Tutela;

use App\Models\Tutela\AutoAdmisorio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Tutela\RelacionPretension;
use App\Models\Tutela\DocRespuestaPretension;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RespuestaPretensiones extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'respuesta_pretensiones';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function relacion()
    {
        return $this->hasMany(RelacionPretension::class, 'respuesta_pretensiones_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function documentos()
    {
        return $this->hasMany(DocRespuestaPretension::class, 'respuesta_pretensiones_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function tutela()
    {
        return $this->belongsTo(AutoAdmisorio::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
 
}
