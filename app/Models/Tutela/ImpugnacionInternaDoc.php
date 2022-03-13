<?php

namespace App\Models\Tutela;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ImpugnacionInternaDoc extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'docimpugnacion_interna';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function impugnacioninterna()
    {
        return $this->belongsTo(ImpugnacionInterna::class, 'impugnacion_interna_id', 'id');
    }
    //----------------------------------------------------------------------------------

}
