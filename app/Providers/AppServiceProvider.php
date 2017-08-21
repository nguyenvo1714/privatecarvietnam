<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        app('view')->composer('admin.layout.app', function($view) {
            $action =  app('request')->route()->getAction();

            $controller = class_basename($action['controller']);

            list($controller, $action) = explode('@', $controller);
            $view->with(compact('controller', 'action'));
        });
        app('view')->composer('admin.layout.admin', function($view) {
            $action =  app('request')->route()->getAction();

            $controller = class_basename($action['controller']);

            list($controller, $action) = explode('@', $controller);
            $view->with(compact('controller', 'action'));
        });
        app('view')->composer('sites.layout.app', function($view) {
            $action =  app('request')->route()->getAction();

            $controller = class_basename($action['controller']);

            list($controller, $action) = explode('@', $controller);
            $view->with(compact('controller', 'action'));
        });
        app('view')->composer('sites.layout.submenu', function($view) {
            $action =  app('request')->route()->getAction();

            $controller = class_basename($action['controller']);

            list($controller, $action) = explode('@', $controller);
            $view->with(compact('controller', 'action'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
