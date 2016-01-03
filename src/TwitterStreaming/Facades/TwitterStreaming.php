<?php
namespace TwitterStreaming\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

class TwitterStreaming extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'twitterstreaming';
    }
}