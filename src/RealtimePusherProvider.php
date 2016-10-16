<?php

namespace Realtime\Push;

use Illuminate\Support\ServiceProvider;

class RealtimePusherProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__.'/../config/config.php' => base_path('config/realtime-pusher.php'),
        ]);
        $this->publishes([
            __DIR__.'/../public/js/notification.js' => base_path('public/js/notification.js'),
        ]);
    }
}
