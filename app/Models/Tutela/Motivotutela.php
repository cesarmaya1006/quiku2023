<?php

namespace App\Models\Tutela;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Motivotutela extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'motivotutelas';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function sub_motivostutelas()
    {
        return $this->hasMany(Submotivotutela::class, 'motivotutelas_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
