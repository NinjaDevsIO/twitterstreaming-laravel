<?php

namespace TwitterStreaming\Laravel;

use TwitterStreaming\Tracker;

class TwitterStreaming extends Tracker
{
    public function __construct($credentials)
    {
        parent::__construct($credentials);
    }
}