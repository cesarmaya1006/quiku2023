<?php

namespace App\Models\Denuncias;

use App\Models\Denuncias\Denuncia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DenunciaHecho extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'denunciashechos';
    protected $guarded = [];
    
    public function denuncia()
    {
        return $this->belongsTo(Denuncia::class, 'denuncias_id', 'id');
    }
}
