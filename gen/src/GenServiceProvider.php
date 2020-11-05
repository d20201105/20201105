<?php

namespace D20201105\Gen;

use D20201105\Gen\Commands\Gen;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class GenServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Gen::class,
            ]);
        }

        Route::middleware('web')
            ->namespace(__NAMESPACE__ . '\Controllers')
            ->group(__DIR__ . '/../routes.php');

        Route::prefix('api')
            ->middleware('api')
            ->namespace(__NAMESPACE__ . '\Controllers')
            ->group(__DIR__ . '/../api.php');

        $this->publishes([
            __DIR__ . '/../config.php' => config_path('d20201105-gen.php'),
        ]);

        $this->loadViewsFrom(__DIR__ . "/../views", 'dg');

        $this->loadMigrationsFrom(__DIR__ . '/../migrations');

        Relation::morphMap([
        ]);
    }
}
