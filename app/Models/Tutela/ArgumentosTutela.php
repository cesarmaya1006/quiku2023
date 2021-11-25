<?php

namespace App\Models\Tutela;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArgumentosTutela extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'argumentos_tutela';
    protected $guarded = [];
}
