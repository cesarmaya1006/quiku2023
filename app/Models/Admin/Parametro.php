<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Parametro extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'parametros';
    protected $guarded = [];
}
