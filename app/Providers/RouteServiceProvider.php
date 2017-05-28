<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);

        //ROUTE UNTUK USER DESA
        $router->group([
            'namespace' => $this->namespace, 'prefix' => 'desa','middleware' => ['web','auth','group:desa'],
        ], function ($router) {
            require app_path('Http/Routes/desa.php');
        });

        //ROUTE UNTUK USER NON DESA (KECAMATAN?KABUPATEN)
        $router->group([
            'namespace' => $this->namespace, 'prefix' => 'main','middleware' => ['web','auth','group:nondesa']
        ], function ($router) {
            require app_path('Http/Routes/nondesa.php');
        });
        
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'middleware' => 'web',
        ], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
