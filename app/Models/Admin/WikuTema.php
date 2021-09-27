<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuTema extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'wikutemas';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function temasespecificos()
    {
        return $this->hasMany(WikuTemaEspecifico::class, 'tema_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function area()
    {
        return $this->belongsTo(WikuArea::class, 'area_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
