# realtime-push
Real-time push notification package for laravel

Please checkout the following library before using it - <a href="http://github.com/rtamizh/instant-notify">instant-notify</a>

# Installation 

```
composer require tamizh/realtime-push
```

or add the following line in composer.json line 

"tamizh/realtime-push" : "dev-master" and run ``` composer update ```

Add the service provider to your config/app.php file:

``` 
        'providers'     => array(
                //...
                Realtime\Push\RealtimePusherProvider::class,

        ), 
```

Add the facade to your config/app.php file:

``` 
        'facades'       => array(

                //...
                'Push'          => Realtime\Push\Facades\RealtimePusher::class,

        ), 
```
    
Publish config file using ``` php artisan vendor:publish ```
Modifiy the config/realtime-pusher.php. That's all set for working with functions

And a js file will be added in public/js/notification.js. include it in your layout or pages that you are need the push notification

```
var notification = new Notification(<user secret>, <url>);
notification.login();
notification.socket.on('notification',function(data){
        // do the stuff you want with data
})
```
As of now the text and image variables available in the server, soon it will be increased. Use text as json and parsse it in browser side javascript to have many variables.

#Functions

1.createApp - to create app in notification server
```
Push::createApp('test')
```
it will return a secert_id with success response. store or add it to the config file for creating users for this app


2.createUser - to create User in notification server
```
Push::createUser('name', 'password')
```
it will return the user secret with success message. store it in your database for sending notification to this user


3.notify - to create and send it to the respective user
```
Push::notify($user_secret, $text, $image)
```

