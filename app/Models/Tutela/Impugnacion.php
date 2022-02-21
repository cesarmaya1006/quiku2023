<?php

namespace App\Models\Tutela;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Impugnacion extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'impugnacion';
    protected $guarded = [];
}
