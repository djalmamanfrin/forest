<?php

declare(strict_types = 1);

namespace Domain\Exception;

use Exception;

/**
 * Class NotFoundRegisterException
 * @package Domain\Exception
 */
class NotFoundRegisterException extends Exception
{
    /**
     * NotFoundRegisterException constructor.
     * @param string $message
     * @param int $code
     * @param Exception|null $previous
     */
    public function __construct($message = 'Register not found', $code = 404, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
