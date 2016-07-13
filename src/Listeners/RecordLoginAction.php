<?php

namespace Suth\LaravelSift\Listeners;

use SiftScience;
use Illuminate\Http\Request;
use Illuminate\Contracts\Queue\ShouldQueue;

abstract class RecordLoginAction implements ShouldQueue
{
    protected $request;
    protected $client;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request, SiftScience $client)
    {
        $this->request = $request;
        $this->client = $client;
    }
}
