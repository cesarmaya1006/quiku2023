<?php

namespace App\Models\Tutela;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Accions extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'accionante_accionado';
    protected $guarded = [];
}
