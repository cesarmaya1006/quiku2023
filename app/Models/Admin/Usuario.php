<?php

namespace App\Models\Admin;

use App\Models\Empleados\Empleado;
use App\Models\Empresas\Representante;
use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Session;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $remember_token = false;
    protected $table = 'usuarios';
    protected $guarded = [];

    protected $hidden = [
        'password',
        'remembre_token',
    ];
    protected $cast = [
        'email_verified_at' => 'datetime',
    ];
    //==================================================================================
    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'usuario_rol', 'usuario_id', 'rol_id');
    }
    //----------------------------------------------------------------------------------
    //==================================================================================
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id');
    }
    //==================================================================================
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id');
    }
    //==================================================================================
    public function representante()
    {
        return $this->belongsTo(Representante::class, 'id');
    }
    //==================================================================================
    public function setSession($roles)
    {
        Session::put([
            'id_usuario' => $this->id,
            'usuario' => $this->usuario

        ]);
        if (count($roles) == 1) {
            Session::put(
                [
                    'rol_id' => $roles[0]['id'],
                    'rol_nombre' => $roles[0]['nombre'],
                ]
            );
        } else {
            Session::put('roles', $roles);
        }
    }
    //==========================================================================================

}
