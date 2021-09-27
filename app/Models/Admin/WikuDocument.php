<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuDocument extends Model
{
    use HasFactory, Notifiable;
    protected $table = "wikudocument";
    protected $guarded = ['id'];

    //----------------------------------------------------------------------------------
    public function normas()
    {
        return $this->hasMany(WikuNorma::class, 'fuente_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
