<?php

namespace App\Models\Tutela;

use App\Models\Admin\WikuArgumento;
use App\Models\Admin\WikuDoctrina;
use App\Models\Admin\WikuJurisprudencia;
use App\Models\Admin\WikuNorma;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Submotivotutela extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'submotivotutelas';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function motivotutela()
    {
        return $this->belongsTo(Motivotutela::class, 'motivotutelas_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function asociacion_wikunormas()
    {
        return $this->belongsToMany(WikuNorma::class, 'asociacionwikunormatutelas','submotivotutela_id', 'wikunormas_id');
    }
    //----------------------------------------------------------------------------------
    public function asociacion_wikuargumentos()
    {
        return $this->belongsToMany(WikuArgumento::class, 'asociacionwikuargumentotutelas','submotivotutela_id', 'wiku_argumento_id');
    }
    //----------------------------------------------------------------------------------
    public function asociacion_wikujurisprudencia()
    {
        return $this->belongsToMany(WikuJurisprudencia::class, 'asociacionwikujurisprudenciatutelas','submotivotutela_id', 'wikujurisprudencia_id');
    }
    //----------------------------------------------------------------------------------
    public function asociacion_wikudoctrinas()
    {
        return $this->belongsToMany(WikuDoctrina::class, 'asociacionwikudoctrinatutelas','submotivotutela_id', 'wikudoctrinas_id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function tutelas()
    {
        return $this->belongsToMany(AutoAdmisorio::class, 'tutela_motivo');
    }
    //----------------------------------------------------------------------------------
}
