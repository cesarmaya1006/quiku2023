<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuPalabras extends Model
{
    use HasFactory, Notifiable;
    protected $table = "wikupalabrasclave";
    protected $guarded = ['id'];

    public function normas()
    {
        return $this->belongsToMany(WikuNorma::class, 'wikupalabrasnormas');
    }
    public function argumentos()
    {
        return $this->belongsToMany(WikuArgumento::class, 'wikupalabrasargumentos');
    }
}
