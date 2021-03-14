<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Permiso extends Model
{
    use HasFactory, Notifiable;
    protected $table = "permisos";
    protected $fillable = ['nombre', 'slug'];
    protected $guarded = ['id'];
    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'permiso_rol');
    }
}
