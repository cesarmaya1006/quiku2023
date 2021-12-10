<?php

namespace App\Models\PQR;

use App\Models\PQR\ResuelveRecurso;
use App\Models\Tutela\ResuelveTutela;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Numeracion extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'numeracionordinal';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function numeracion()
    {
        return $this->belongsTo(Resuelve::class, 'orden', 'id');
    }
    //----------------------------------------------------------------------------------
    public function numeracionrecursos()
    {
        return $this->belongsTo(ResuelveRecurso::class, 'orden', 'id');
    }
    //----------------------------------------------------------------------------------
    public function numeracionTutela()
    {
        return $this->belongsTo(ResuelveTutela::class, 'orden', 'id');
    }
    //----------------------------------------------------------------------------------
}
