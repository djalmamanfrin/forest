<?php

declare(strict_types = 1);

namespace Tests\Domain\Entity;

use Domain\Entity\Bear;
use Tests\TestCase;

/**
 * Class BearTest
 * @package Tests\Domain\EntityTest
 */
class BearTest extends TestCase
{
    /**
     * Cheack if entity class exists in Domain/Entity
     */
    public function testsEntityClassExists()
    {
        $this->assertInstanceOf(Bear::class, new Bear());
    }

    /**
     * Check if entity class has their attribute
     */
    public function testEntityHasAttribute()
    {
        $this->assertObjectHasAttribute('name', new Bear());
        $this->assertObjectHasAttribute('slug', new Bear());
        $this->assertObjectHasAttribute('type', new Bear());
        $this->assertObjectHasAttribute('danger_level', new Bear());
    }

    /**
     * Check if methods exist in entity
     */
    public function testMethodsExistsInEntity()
    {
        $object = new Bear();

        $this->assertTrue(method_exists($object, 'getName'));
        $this->assertTrue(method_exists($object, 'setName'));

        $this->assertTrue(method_exists($object, 'getSlug'));

        $this->assertTrue(method_exists($object, 'getType'));
        $this->assertTrue(method_exists($object, 'setType'));

        $this->assertTrue(method_exists($object, 'getDangerLevel'));
        $this->assertTrue(method_exists($object, 'setDangerLevel'));
    }

    /**
     * Check if set methods are fluent
     * @return Bear
     */
    public function testSetMethodsAreFluent()
    {
        $object = new Bear();

        $this->assertInstanceOf(Bear::class, $object->setName('Bear Name'));
        $this->assertInstanceOf(Bear::class, $object->setType('Bear Type'));
        $this->assertInstanceOf(Bear::class, $object->setDangerLevel(1));

        return $object;
    }

    /**
     * Check value in set methods
     * @param Bear $object
     * @depends testSetMethodsAreFluent
     */
    public function testAttributesSetMethods(Bear $object)
    {
        $this->assertAttributeEquals('Bear Name', 'name', $object);
        $this->assertAttributeEquals('Bear Type', 'type', $object);
        $this->assertAttributeEquals(1, 'danger_level', $object);
    }

    /**
     * Check get is equal in set methods
     * @param Bear $object
     * @depends testSetMethodsAreFluent
     */
    public function testGetMethods(Bear $object)
    {
        $this->assertEquals('Bear Name', $object->getName());
        $this->assertEquals('bear-name', $object->getSlug());
        $this->assertEquals('Bear Type', $object->getType());
        $this->assertEquals(1, $object->getDangerLevel());
    }
}
