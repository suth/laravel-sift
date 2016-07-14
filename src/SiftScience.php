<?php

namespace Suth\LaravelSift;

use SiftClient;
use Illuminate\Contracts\Auth\Authenticatable;

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

    /**
     * Get the ID used to reference the customer in Sift
     *
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     * @return mixed
     */
    public static function getUserId(Authenticatable $user)
    {
        if (method_exists($user, 'getSiftId')) {
            return $user->getSiftId();
        }

        return $user->getAuthIdentifier();
    }
}
