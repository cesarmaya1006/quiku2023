<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Nivel extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'niveles';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function cargos()
    {
        return $this->hasMany(Cargo::class, 'nivel_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
