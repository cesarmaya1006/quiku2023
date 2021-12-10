<?php

namespace App\Models\Tutela;

use App\Models\Tutela\AutoAdmisorio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnexoTutela extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'tutela_anexo';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function tutela()
    {
        return $this->belongsTo(AutoAdmisorio::class, 'auto_admisorio_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
