<?php

namespace Vksco\DomainModuleCreator;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Vksco\DomainModuleCreator\DomainModuleCreator
 */
class DomainModuleCreatorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'domain-module-creator';
    }
}
