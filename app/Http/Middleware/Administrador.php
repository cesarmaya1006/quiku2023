<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Administrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->permiso())
            return $next($request);
        return redirect('admin-index')->with('mensaje', 'No tiene permiso para entrar aquí');
    }
    private function permiso()
    {
        return session()->get('rol_nombre') == 'Administrador Sistema' || session()->get('rol_nombre') == 'Administrador';
    }
}
