<?php

namespace Pigeon\Laravel;

use Illuminate\Support\Facades\Facade;

/**
 * Facade for the Pigeon.
 */
class PigeonFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'pigeon';
    }
}
