<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuAutor extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'wikuautores';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function argumentos()
    {
        return $this->hasMany(WikuArgumento::class, 'wikuautores_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
