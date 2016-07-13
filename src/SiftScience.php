<?php

namespace Suth\LaravelSift;

use SiftClient;

class SiftScience
{
    public $client;

    public function __construct(SiftClient $client)
    {
        $this->client = $client;
    }
}
