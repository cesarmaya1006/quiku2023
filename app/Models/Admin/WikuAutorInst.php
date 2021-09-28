<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuAutorInst extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'wikuautorinstitu';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function argumentos()
    {
        return $this->hasMany(WikuArgumento::class, 'wikuautorinstitu_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
