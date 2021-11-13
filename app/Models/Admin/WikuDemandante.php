<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuDemandante extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'wikudemandante';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function jurisprudencias()
    {
        return $this->hasMany(WikuJurisprudencia::class, 'demandante_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
