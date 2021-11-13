<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuSala extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'wikusala';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function subsalas()
    {
        return $this->hasMany(WikuSubsala::class, 'sala_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function ente()
    {
        return $this->belongsTo(WikuEnteEmisor::class, 'ente_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
