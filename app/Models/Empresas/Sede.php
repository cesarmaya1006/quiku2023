<?php

namespace App\Models\Empresas;

use App\Models\Admin\Departamento;
use App\Models\Admin\Municipio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Sede extends Model
{
    use HasFactory, Notifiable;

    protected $table = "sedes";
    protected $guarded = ['id'];

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id', 'id');
    }

    public function departamentos()
    {
        return $this->belongsToMany(Departamento::class, 'area_influencia');
    }
}
