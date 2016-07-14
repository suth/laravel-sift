<?php

namespace Suth\LaravelSift;

use SiftClient;
use Illuminate\Session\Store as SessionStore;
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
    public static function getUserId(Authenticatable $user = null)
    {
        if (is_null($user)) {
            $user = auth()->user();
        }

        if (method_exists($user, 'getSiftId')) {
            return $user->getSiftId();
        }

        return $user->getAuthIdentifier();
    }

    /**
     * Get the Sift session ID
     *
     * @param \Illuminate\Session\Store $store
     * @return string
     */
    public static function getSessionId(SessionStore $store = null)
    {
        if (is_null($store)) {
            $store = session();
        }

        return $store->get('sift_session_id');
    }
}
