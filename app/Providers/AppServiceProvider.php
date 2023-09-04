<?php

namespace App\Providers;

use App\Repositories\Contracts\PdoPersonRepositoryInterface;
use App\Repositories\PdoPersonRepository;

class AppServiceProvider
{
    private static $dependencies = [
        PdoPersonRepositoryInterface::class => PdoPersonRepository::class
    ];

    public static function bind(string $class)
    {
        return self::$dependencies[$class];
    }
}