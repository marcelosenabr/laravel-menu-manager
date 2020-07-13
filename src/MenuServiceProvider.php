<?php

namespace Harimayco\Menu;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!$this->app->routesAreCached()) {
            require  __DIR__ . '/routes.php';
        }

        $this->loadViewsFrom(__DIR__ . '/Views', 'wmenu');

        $this->publishes([
            __DIR__ . '/../config/menu.php'  => config_path('menu.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/Views'   => resource_path('views/vendor/wmenu'),
        ], 'view');

        $this->publishes([
            __DIR__ . '/../assets' => public_path('vendor/harimayco-menu'),
        ], 'public');

        $this->publishes([
            __DIR__ . '/../migrations/2020_07_10_000000_create_menus_wp_table.php' => database_path('migrations/2020_07_10_000000_create_menus_wp_table.php'),
            __DIR__ . '/../migrations/2020_07_11_000000_create_menu_items_wp_table.php' => database_path('migrations/2020_07_11_000000_create_menu_items_wp_table.php'),
            __DIR__ . '/../migrations/2020_07_12_000000_add-role-id-to-menu-items-table.php' => database_path('migrations/2020_07_12_000000_add-role-id-to-menu-items-table.php'),
        ], 'migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('harimayco-menu', function () {
            return new WMenu();
        });

        $this->app->make('Harimayco\Menu\Controllers\MenuController');
        $this->mergeConfigFrom(
            __DIR__ . '/../config/menu.php',
            'menu'
        );

        $this->registerFacade();
    }

    /**
     * Registrar classe Menu Facade
     *
     * @return void
     */
    private function registerFacade()
    {
        $this->app->singleton('alert-menu', function () {
            return new AlertMenu;
        });
    }
}
