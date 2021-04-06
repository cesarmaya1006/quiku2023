<?php

namespace App\Models\PQR;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SubMotivo extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'motivo_sub';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function motivo()
    {
        return $this->belongsTo(Motivo::class, 'motivo_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
