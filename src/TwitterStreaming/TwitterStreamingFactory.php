<?php

namespace TwitterStreaming\Laravel;

use TwitterStreaming\Tracker;
use TwitterStreaming\Endpoints;

/**
 * This is the class that gonna be loaded in the Service Provider
 *
 * Class TwitterStreamingFactory
 * @package TwitterStreaming\Laravel
 */
class TwitterStreamingFactory extends Tracker
{
    /**
     * @var Tracker (instance of TwitterStreaming)
     */
    protected $tracker;

    public function __construct($credentials)
    {
        /**
         * Provide the credentials defined in the Laravel configuration side
         */
        $this->tracker = new Tracker([
            'TWITTERSTREAMING_CONSUMER_KEY' => $credentials['CONSUMER_KEY'],
            'TWITTERSTREAMING_CONSUMER_SECRET' => $credentials['CONSUMER_SECRET'],
            'TWITTERSTREAMING_TOKEN' => $credentials['ACCESS_TOKEN'],
            'TWITTERSTREAMING_TOKEN_SECRET' => $credentials['ACCESS_TOKEN_SECRET']
        ]);
    }

    /**
     * This method is an alias of:
     * endpoint(Endpoints\PublicEndpoint::class, 'filter')
     *
     * @return mixed
     */
    public function publicFilter()
    {
        return $this->tracker->endpoint(Endpoints\PublicEndpoint::class, 'filter');
    }

    /**
     * This method is an alias of:
     * endpoint(Endpoints\PublicEndpoint::class, 'sample')
     *
     * @return mixed
     */
    public function publicSample()
    {
        return $this->tracker->endpoint(Endpoints\PublicEndpoint::class, 'sample');
    }

    /**
     * This method is an alias of:
     * endpoint(Endpoints\UserEndpoint::class)
     *
     * @return mixed
     */
    public function user()
    {
        return $this->tracker->endpoint(Endpoints\UserEndpoint::class);
    }
}