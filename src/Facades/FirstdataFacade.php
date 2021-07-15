<?php

namespace Sargilla\Firstdata\Facades;

use Illuminate\Support\Facades\Facade;

class FirstdataFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'firstdata';
    }
}