<?php

namespace Almamun2s\TinyMCE;

use Almamun2s\TinyMCE\TinyMCE;
use Illuminate\Support\ServiceProvider;

class TinyMCEServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     * @return void
     */
    public function boot()
    {
        $path = __DIR__ . '/../config/tinymce.php';
        $this->mergeConfigFrom($path, 'tinymce');

        $this->publishes([
            $path => config_path('tinymce.php'),
        ], 'tinymce');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('tinymce', function ($app) {
            return new TinyMCE($app);
        });
    }
}