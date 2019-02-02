<?php

namespace Pigeon\Laravel;

use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;
use Pigeon\Client as PigeonApi;

/**
 * PHP service provider for Laravel applications.
 */
class PigeonServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([
                dirname(__DIR__).'/config/pigeon.php' => config_path('pigeon.php'),
            ]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('pigeon');
        }
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton(Pigeon::class, function ($app) {
            $config = $app->make('config')->get('pigeon');

            return new PigeonApi($config['public_key'], $config['private_key'], $config['base_uri']);
        });

        $this->app->alias(Pigeon::class, 'pigeon');
    }
}
