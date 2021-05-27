<?php

namespace CodersStudio\SmsRu;

use Illuminate\Support\ServiceProvider;
use CodersStudio\SmsRu\Vendor\SmsRu AS SmsRuClient;

class SmsRuServiceProvider extends ServiceProvider
{
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/sms-ru.php', 'sms-ru');

        $this->app->singleton('SmsRu', function ($app) {
            return new SmsRu();
        });

        $this->app->singleton('SmsRuClient', function ($app) {
            $api = config('sms-ru.api_key');
            return new SmsRuClient($api);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
       // return ['notifications'];
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }



    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/sms-ru.php' => config_path('sms-ru.php'),
        ], 'sms-ru.config');

        // Registering package commands.
        // $this->commands([]);
    }
}
