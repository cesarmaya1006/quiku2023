<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuJurisJuris extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'wikujurisjuris';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function jurisprudencia()
    {
        return $this->hasMany(WikuJurisprudencia::class, 'jurisprudencia1_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function jurisprudencias()
    {
        return $this->hasMany(WikuJurisprudencia::class, 'jurisprudencia2_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
