<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuArgCriterio extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'wikuargcriterios';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function argumento()
    {
        return $this->belongsToMany(WikuArgumento::class, 'argumento_id', 'id');
    }
}
