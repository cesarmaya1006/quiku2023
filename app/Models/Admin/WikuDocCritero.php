<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WikuDocCritero extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'wikudoccriterios';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function doctrina()
    {
        return $this->belongsToMany(WikuDoctrina::class, 'doctrina_id', 'id');
    }
}
