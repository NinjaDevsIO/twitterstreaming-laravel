<?php

namespace TwitterStreaming\Laravel;

use TwitterStreaming\Tracker;
use TwitterStreaming\Endpoints;
use TwitterStreaming\Extensions;

/**
 * This is the class that gonna be loaded in the Service Provider
 *
 * Class TwitterStreamingFactory
 * @package TwitterStreaming\Laravel
 */
class TwitterStreamingFactory extends Tracker
{
    /**
     * @var string
     */
    protected $filtersClass = Extensions\Filters::class;

    /**
     * @var bool
     */
    protected $filtersIsEnabled = false;

    public function __construct($credentials)
    {
        /**
         * Provide the credentials defined in the Laravel configuration side
         */
        parent::__construct([
            'TWITTERSTREAMING_CONSUMER_KEY' => $credentials['CONSUMER_KEY'],
            'TWITTERSTREAMING_CONSUMER_SECRET' => $credentials['CONSUMER_SECRET'],
            'TWITTERSTREAMING_TOKEN' => $credentials['ACCESS_TOKEN'],
            'TWITTERSTREAMING_TOKEN_SECRET' => $credentials['ACCESS_TOKEN_SECRET']
        ]);

        // Check if filters module are installed
        $this->filtersIsEnabled = class_exists($this->filtersClass);

        $this->addFiltersIfEnabled();
    }

    private function addFiltersIfEnabled()
    {
        if (!$this->filtersIsEnabled) {
            return;
        }

        parent::addExtension($this->filtersClass);
    }

    /**
     * This method is an alias of:
     * endpoint(Endpoints\PublicEndpoint::class, 'filter')
     *
     * @return mixed
     */
    public function publicFilter()
    {
        return parent::endpoint(Endpoints\PublicEndpoint::class, 'filter');
    }

    /**
     * This method is an alias of:
     * endpoint(Endpoints\PublicEndpoint::class, 'sample')
     *
     * @return mixed
     */
    public function publicSample()
    {
        return parent::endpoint(Endpoints\PublicEndpoint::class, 'sample');
    }

    /**
     * This method is an alias of:
     * endpoint(Endpoints\UserEndpoint::class)
     *
     * @return mixed
     */
    public function user()
    {
        return parent::endpoint(Endpoints\UserEndpoint::class);
    }
}