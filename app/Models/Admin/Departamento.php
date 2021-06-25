<?php

namespace App\Models\Admin;

use App\Models\Empresas\Sede;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Departamento extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'departamento';
    protected $guarded = [];

    public function municipios()
    {
        return $this->hasMany(Municipio::class, 'departamento_id', 'id');
    }

    public function sedes()
    {
        return $this->belongsToMany(Sede::class, 'area_influencia');
    }
}
