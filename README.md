# realtime-push
Real-time push notification package for laravel

Please checkout the following library before using it - <a href="http://github.com/rtamizh/instant-notify">instant-notify</a>

# Installation 

``` composer require tamizh/realtime-push ``` 

or add the following line in composer.json line 

"tamizh/realtime-push" : "dev-master" and run ``` composer update ```

Add the service provider to your config/app.php file:

``` 'providers'     => array(

        //...
        Realtime\Push\RealtimePusherProvider::class,

    ), ```

Add the facade to your config/app.php file:

``` 'facades'       => array(

        //...
        'Curl'          => Realtime\Push\Facades\RealtimePusher::class,

    ), ```
    
Publish config file using ``` php artisan vendor:publish ```
Modifiy the config/realtime-pusher.php. That's all set for working with functions

#Functions

  
