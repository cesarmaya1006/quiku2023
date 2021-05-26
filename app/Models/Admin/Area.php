<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Area extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'areas';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function niveles()
    {
        return $this->hasMany(Nivel::class, 'area_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
