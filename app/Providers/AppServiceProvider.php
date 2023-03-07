<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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

        $menu = ['Phone', 'Laptop'];
        view()->share('menu', $menu);

        // $menus = Menu::get();
        // $sub =  SubMenu::get();
        // View::share([
        //     'menus' => $menus,
        //     'sub' => $sub
        // ]);

        Paginator::useBootstrap();
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
