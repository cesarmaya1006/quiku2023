<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuMagistrado extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'wikumagistrado';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function jurisprudencias()
    {
        return $this->hasMany(WikuJurisprudencia::class, 'magistrado_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
