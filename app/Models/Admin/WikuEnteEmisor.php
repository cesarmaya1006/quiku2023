<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuEnteEmisor extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'wikuenteemisor';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function salas()
    {
        return $this->hasMany(WikuSala::class, 'ente_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
