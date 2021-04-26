<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Tipo_Docu extends Model
{
    use HasFactory, Notifiable;

    protected $table = "docutipos";
    protected $guarded = ['id'];
}
