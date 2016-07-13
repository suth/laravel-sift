<?php

namespace Suth\LaravelSift\Facades;

use Illuminate\Support\Facades\Facade;

class SiftScience extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Suth\LaravelSift\SiftScience::class;
    }
}
