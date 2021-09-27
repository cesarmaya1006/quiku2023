<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuTemaEspecifico extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'wikutemaespecifico';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function norma()
    {
        return $this->hasMany(WikuNorma::class, 'wikutemaespecifico_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function tema_()
    {
        return $this->belongsTo(WikuTema::class, 'tema_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
