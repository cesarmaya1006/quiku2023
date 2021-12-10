<?php

namespace App\Models\Tutela;

use App\Models\Empleados\Empleado;
use App\Models\Tutela\AutoAdmisorio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Tutela\PretensionesTutela;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistorialPretension extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'historial_pretensiones';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function tutela()
    {
        return $this->belongsTo(AutoAdmisorio::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function pretension()
    {
        return $this->belongsTo(PretensionesTutela::class, 'pretensiones_tutela_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    //----------------------------------------------------------------------------------

}
