<?php

declare(strict_types = 1);

namespace Test\Domain\Repository;

use Domain\Repository\RepositoryBase;
use Tests\TestCase;

/**
 * Class RepositotyBaseTest
 * @package Test\Domain\Repository
 */
class RepositoryBaseTest extends TestCase
{
    private $mock;

    /**
     * Using mock to instance a an abstract class
     */
    protected function setUp()
    {
        $this->mock = $this->getMockBuilder(RepositoryBase::class)->getMock();
    }

    /**
     * Test if the RepositoryBase exist
     */
    public function testInstanceClass()
    {
        $this->assertInstanceOf(RepositoryBase::class, $this->mock);
    }
}
