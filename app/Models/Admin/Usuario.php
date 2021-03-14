<?php

namespace App\Models\Admin;

use App\Models\Empresas\Solicitud;
use App\Models\Mgl\Apoderado;
use App\Models\Mgl\Asistente;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
    public function tipos_docu()
    {
        return $this->belongsTo(Tipo_Docu::class, 'docutipos_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function apoderado()
    {
        return $this->belongsTo(Apoderado::class);
    }
    //----------------------------------------------------------------------------------
    public function asistente()
    {
        return $this->belongsTo(Asistente::class);
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function solicitudes()
    {
        return $this->belongsToMany(Solicitud::class, 'solicitudusuarios');
    }
    //----------------------------------------------------------------------------------
    public function gestionesSolicitud()
    {
        return $this->hasMany(SolicitudGestion::class, 'usuario_id', 'id');
    }
    //==================================================================================
    public function setSession($roles)
    {
        Session::put([
            'id_usuario' => $this->id,
            'tipo_docu_id' => $this->tipo_docu_id,
            'identificacion' => $this->identificacion,
            'nombres' => $this->nombres,
            'contra' => $this->password,
            'apellidos' => $this->apellidos,
            'genero' => $this->genero,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'foto' => $this->foto,
            'camb_password' => $this->camb_password,

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
