<?php

namespace Suth\LaravelSift\Listeners;

use Illuminate\Http\Request;
use Suth\LaravelSift\SiftScience;
use Illuminate\Contracts\Queue\ShouldQueue;

abstract class RecordAuthAction implements ShouldQueue
{
    protected $request;
    protected $sift;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request, SiftScience $sift)
    {
        $this->request = $request;
        $this->sift = $sift;
    }
}
