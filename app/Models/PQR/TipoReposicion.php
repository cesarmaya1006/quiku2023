<?php

namespace App\Models\PQR;

use App\Models\PQR\Recurso;
use App\Models\PQR\ResuelveRecurso;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoReposicion extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'tipo_reposicion';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function recursos()
    {
        return $this->hasMany(Recurso::class, 'tipo_reposicion_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function recursosresuelve()
    {
        return $this->hasMany(ResuelveRecurso::class, 'tipo_reposicion_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
