<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuArea extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'wikuareas';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function temas()
    {
        return $this->hasMany(WikuTema::class, 'area_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
