<?php

namespace App\Models\Tutela;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PretensionesTutela extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'pretensiones_tutela';
    protected $guarded = [];
}
