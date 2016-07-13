<?php

namespace Suth\LaravelSift;

use SiftClient;

class SiftScience
{
    protected $client;

    public function __construct(SiftClient $client)
    {
        $this->client = $client;
    }

    /**
     * Get the sift-php client
     *
     * @return SiftClient
     */
    public function client()
    {
        return $this->client;
    }
}
