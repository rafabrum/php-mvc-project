<?php

namespace App\Http\Requests;

use Exception;

class Request
{
    private $requestParams;

    public function __construct(array $customParams = [])
    {
        $this->requestParams = array_merge($_GET, $_POST, $_REQUEST, $customParams);
    }

    /**
     * @param string $key
     *
     * @return mixed
     * @throws Exception
     */
    public function get(string $key)
    {
        if (array_key_exists($key, $this->requestParams)) {
            return $this->requestParams[$key];
        }

        throw new Exception('Field not fount.');
    }

    public function all(): array
    {
        return $this->requestParams;
    }
}