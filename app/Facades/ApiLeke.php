<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ApiLeke extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'api-leke';
    }

}