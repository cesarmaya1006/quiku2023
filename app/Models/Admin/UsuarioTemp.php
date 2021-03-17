<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UsuarioTemp extends Model
{
    use HasFactory,Notifiable;
    protected $table = 'usuariotemp';
    protected $guarded = [];

}
