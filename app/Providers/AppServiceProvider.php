<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models;
use App\Models\Modules;
use App\Models\SubModules;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\Pages;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        view()->composer('admin.partials.sidemenu', function($view){
            $modules = Modules::where('enabled', 1)->orderBy('sort_order')->get();
            $submodules = SubModules::where('enabled',1)->orderBy('sort_order')->get();
            $view->with(['modules' => $modules, 'submodules' => $submodules]);
        });
        view()->composer('site.layouts.main', function($view){
            $menu = Menu::get();
            $submenu = SubMenu::get();
            $pages = Pages::get();
            $view->with(['menu' => $menu, 'submenu' => $submenu, 'pages' => $pages]);
        });
    }
}
