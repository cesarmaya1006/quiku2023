<?php

namespace App\Providers;

use App\Models\Admin\Menu;
use App\Models\Admin\Parametro;
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

        View::composer("theme.back.menu_lat", function ($view) {
            $menus = Menu::getMenu(true);
            $view->with('menusComposer', $menus);
        });
    }
}
