<?php

namespace App\Core\Exceptions;

use Exception;
use Throwable;

class ActionNotFoundException extends Exception
{
    /**
     * ActionNotFoundException constructor.
     *
     * @param string         $message
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct('The requested action was not found on this Controller.', $code, $previous);
    }
}