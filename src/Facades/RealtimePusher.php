<?php 

namespace Realtime\Push\Facades;

use Illuminate\Support\Facades\Facade;

class RealtimePusher extends Facade {
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Realtime\Push\RealtimePusher'; // the IoC binding.
    }
}