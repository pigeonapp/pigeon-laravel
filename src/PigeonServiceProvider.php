<?php

namespace Pigeon\Laravel;

use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

use Pigeon\Pigeon as PigeonApi;

/**
 * PHP service provider for Laravel applications.
 */
class PigeonServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the configuration.
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

        $this->mergeConfigFrom(dirname(__DIR__).'/config/pigeon.php', 'pigeon');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('pigeon', function ($app) {
            $config = $app->make('config')->get('pigeon');

            return new PigeonApi($config->public_key, $config->private_key, $config->base_uri);
        });

        $this->app->alias('pigeon', 'Pigeon\Pigeon');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['pigeon', 'Pigeon\Pigeon'];
    }
}
