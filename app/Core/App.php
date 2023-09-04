<?php

namespace App\Core;

use App\Core\Exceptions\ActionNotFoundException;
use App\Core\Exceptions\ClassNotFoundException;
use App\Core\Exceptions\MethodNotAllowedException;
use App\Core\Exceptions\RouteNotFoundException;
use App\Http\Requests\Request;
use App\Providers\RouteServiceProvider;
use ReflectionException;

class App
{
    /**
     * @param Request $request
     * @throws ActionNotFoundException
     * @throws ClassNotFoundException
     * @throws MethodNotAllowedException
     * @throws ReflectionException
     * @throws RouteNotFoundException
     */
    public function run(Request $request)
    {
        RouteServiceProvider::resolve($request->get('url'));
    }
}