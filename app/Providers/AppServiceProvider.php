<?php

namespace App\Providers;

use App\Models\Admin\Menu;
use App\Models\Admin\Parametro;
use App\Models\Admin\Usuario;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer("extranet.plantilla", function ($view) {
            $parametro = Parametro::findOrFail(1);
            $view->with('parametro', $parametro);
        });
        View::composer("extranet.plantilla2", function ($view) {
            $parametro = Parametro::findOrFail(1);
            $view->with('parametro', $parametro);
        });

        View::composer("theme.back.menu_lat", function ($view) {
            $usuario = Usuario::findOrFail(session('id_usuario'));
            $menus = Menu::getMenu(true);
            $view->with('menusComposer', $menus)->with('usuario', $usuario);
        });
    }
}
