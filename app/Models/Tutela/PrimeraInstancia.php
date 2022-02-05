<?php

namespace App\Models\Tutela;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PrimeraInstancia extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'sentenciapinstancia';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function tutela()
    {
        return $this->belongsTo(AutoAdmisorio::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function anexosPrimeraInstancia()
    {
        return $this->hasMany(AnexoPrimeraInstancia::class, 'sentenciapinstancia_id', 'id');
    }
    //----------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------
    public function resuelvesPrimeraInstancia()
    {
        return $this->hasMany(ResuelvePrimeraInstancia::class, 'sentenciapinstancia_id', 'id');
    }
    //----------------------------------------------------------------------------------


}
