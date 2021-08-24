<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuNorma extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'wikunormas';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function documento()
    {
        return $this->belongsTo(WikuDocument::class, 'fuente_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
