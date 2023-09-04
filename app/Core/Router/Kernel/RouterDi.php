<?php

namespace App\Core\Router\Kernel;

use ReflectionClass;
use ReflectionException;
use App\Providers\AppServiceProvider;

class RouterDi
{
    /**
     * @var string
     */
    protected static $namespace = '\\App\Http\Controllers\\';

    /**
     * @param string $class
     *
     * @return mixed
     * @throws ReflectionException
     */
    public function getConstructorClass(string $class)
    {

        $reflectionClass = new ReflectionClass($class);

        if ($reflectionClass->isInterface()) {
            $class           = AppServiceProvider::bind($class);
            $reflectionClass = new ReflectionClass($class);
        }

        $reflectionClassConstructor = $reflectionClass->getConstructor();
        $constructorParams          = [];

        if (!is_null($reflectionClassConstructor)) {
            $reflectionParams = $reflectionClassConstructor->getParameters();

            foreach ($reflectionParams as $reflectionParam) {
                $param               = $reflectionParam->getType()->getName();
                $constructorParams[] = self::getConstructorClass($param);
            }
        }

        return new $class(...$constructorParams);
    }
}