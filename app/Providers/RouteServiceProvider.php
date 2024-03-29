<?php

namespace App\Providers;

use App\Core\Exceptions\ActionNotFoundException;
use App\Core\Exceptions\ClassNotFoundException;
use App\Core\Exceptions\MethodNotAllowedException;
use App\Core\Exceptions\RouteNotFoundException;
use App\Core\Router\Kernel\RegexRoute;
use App\Core\Router\Kernel\SimpleRoute;
use App\Core\Router\Router;
use App\Http\Requests\Request;
use ReflectionException;

class RouteServiceProvider
{
    private Request $request;

    /**
     * RouteServiceProvider constructor.
     */
    public function __construct()
    {
        $this->request = new Request();
    }

    /**
     * @param string $route
     *
     * @throws ActionNotFoundException
     * @throws ClassNotFoundException
     * @throws MethodNotAllowedException
     * @throws ReflectionException
     * @throws RouteNotFoundException
     */
    public static function resolve(string $route): void
    {
        $httpMethod = $_SERVER['REQUEST_METHOD'];

        if (array_key_exists($route, Router::getRoutes())) {
            $simpleRoute = new SimpleRoute();
            $simpleRoute->handle($route, $httpMethod, Router::getRoutes());
        } else {
            $routeRegex     = new RegexRoute();
            $routeRegexData = $routeRegex->resolve($route);

            if (is_array($routeRegexData)) {
                $routeRegex->handle($httpMethod, $routeRegexData, Router::getRoutesRegex());
            } else {
                throw new RouteNotFoundException();
            }
        }
    }
}