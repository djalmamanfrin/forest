<?php

declare(strict_types = 1);

namespace Tests\Domain\EntityTest;

use Carbon\Carbon;
use Domain\Entity\Entity;
use Tests\TestCase;

/**
 * Class EntityTest
 * @package Tests\Domain\EntityTest
 */
class EntityTest extends TestCase
{
    /**
     * Check if exists entity class
     */
    public function testEntityClassExists()
    {
        $class = $this->getMockBuilder(Entity::class)->getMock();

        $this->assertInstanceOf(Entity::class, $class);
    }

    /**
     * Check the get and set methods in entity class
     */
    public function testEntityMethodsExists()
    {
        $entity = $this->getMockForAbstractClass(Entity::class);

        $this->assertTrue(method_exists($entity, 'getId'));
        $this->assertTrue(method_exists($entity, 'setId'));

        $this->assertTrue(method_exists($entity, 'getCreatedAt'));
        $this->assertTrue(method_exists($entity, 'setCreatedAt'));

        $this->assertTrue(method_exists($entity, 'getUpdatedAt'));
        $this->assertTrue(method_exists($entity, 'setUpdatedAt'));

        $this->assertTrue(method_exists($entity, 'getDeletedAt'));
        $this->assertTrue(method_exists($entity, 'setDeletedAt'));
    }

    public function testSetReturnAnEntity()
    {
        $entity = $this->getMockForAbstractClass(Entity::class);

        $this->assertInstanceOf(Entity::class, $entity->setId(1));
        $this->assertInstanceOf(Entity::class, $entity->setCreatedAt(Carbon::now()));
        $this->assertInstanceOf(Entity::class, $entity->setUpdatedAt(Carbon::now()));
        $this->assertInstanceOf(Entity::class, $entity->setDeletedAt(Carbon::now()));
    }
}
