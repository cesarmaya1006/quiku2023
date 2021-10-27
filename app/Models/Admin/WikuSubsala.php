<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuSubsala extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'wikusubsala';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function sala()
    {
        return $this->belongsTo(WikuSala::class, 'sala_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
