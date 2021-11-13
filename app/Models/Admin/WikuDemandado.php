<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuDemandado extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'wikudemandado';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function jurisprudencias()
    {
        return $this->hasMany(WikuJurisprudencia::class, 'demandado_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
