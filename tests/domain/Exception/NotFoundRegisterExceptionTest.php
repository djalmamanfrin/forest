<?php

declare(strict_types = 1);

namespace Test\Domain\Exception;

use Domain\Exception\NotFoundRegisterException;
use Tests\TestCase;

/**
 * Class NotFoundRegisterExceptionTest
 * @package Test\Domain\Exception
 */
class NotFoundRegisterExceptionTest extends TestCase
{
    /**
     * Test if the NotFoundRegisterException class exist
     * @return NotFoundRegisterException
     */
    public function testInstanceClass()
    {
        $exception = new NotFoundRegisterException();
        $this->assertInstanceOf(NotFoundRegisterException::class, $exception);

        return $exception;
    }

    /**
     * Test the error returned http
     * @depends testInstanceClass
     * @param NotFoundRegisterException $exception
     */
    public function testReturnedErrorHttp(NotFoundRegisterException $exception)
    {
        $this->assertEquals(404, $exception->getCode());
    }
}
