<?php

return[
	"url" => env('REALTIME_PUSHER_URL', 'http://localhost'),
	"port" => env('REALTIME_PUSHER_PORT', '3000'),
	"app_secret_id" => env('REALTIME_PUSHER_APP_SECRET', null),
	// if you have basic http authentication fill these credentials othervise leave as it is
	"username" => env('REALTIME_PUSHER_USERNAME', null),
	"password" => env('REALTIME_PUSHER_PASSWORD', null)
];