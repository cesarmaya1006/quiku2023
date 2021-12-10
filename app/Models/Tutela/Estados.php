<?php

namespace App\Models\Tutela;

use App\Models\Tutela\AutoAdmisorio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estados extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'estadostutela';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function tutelas()
    {
        return $this->hasMany(AutoAdmisorio::class, 'estadostutela_id', 'id');
    }
    //----------------------------------------------------------------------------------
}