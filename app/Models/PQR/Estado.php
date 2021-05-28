<?php

namespace App\Models\PQR;

use App\Models\PQR\PQR;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estado extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'estadospqr';
    protected $guarded = [];
    
    public function pqrs()
    {
        return $this->hasMany(PQR::class, 'estadopqr_id', 'id');
    }
}
