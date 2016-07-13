<?php

namespace Suth\LaravelSift\Listeners;

use Illuminate\Http\Request;
use Suth\LaravelSift\SiftScience;
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
    public function __construct(Request $request, SiftScience $sift)
    {
        $this->request = $request;
        $this->client = $sift->client;
    }
}
