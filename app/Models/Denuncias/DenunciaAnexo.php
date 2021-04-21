<?php

namespace App\Models\Denuncias;

use App\Models\Denuncias\Denuncia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DenunciaAnexo extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'denunciasanexos';
    protected $guarded = [];
    
    public function denuncia()
    {
        return $this->belongsTo(Denuncia::class, 'denuncia_id', 'id');
    }
}
