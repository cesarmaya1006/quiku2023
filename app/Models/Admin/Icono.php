<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Icono extends Model
{
    use HasFactory, Notifiable;
    protected $table = "icono";
    protected $guarded = ['id'];
}
