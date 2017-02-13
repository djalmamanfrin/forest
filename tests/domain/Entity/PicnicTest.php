<?php

declare(strict_types = 1);

namespace Tests\Domain\Entity;

use Tests\TestCase;
use Domain\Entity\Picnic;

/**
 * Class Picnic
 * @package Tests\Domain\Entity
 */
class PicnicTest extends TestCase
{
    /**
     * Check if entity class exist in Domain\Entity
     */
    public function testEntityClassExist()
    {
        $this->assertInstanceOf(Picnic::class, new Picnic());
    }

    /**
     * Check if entity class has their attribute
     */
    public function testEntityHasAttribute()
    {
        $this->assertObjectHasAttribute('name', new Picnic());
        $this->assertObjectHasAttribute('taste_level', new Picnic());
    }

    /**
     * Check if methods exist in entity
     */
    public function testMethodsExistInEntity()
    {
        $object = new Picnic();

        $this->assertTrue(method_exists($object, 'getName'));
        $this->assertTrue(method_exists($object, 'setName'));

        $this->assertTrue(method_exists($object, 'getTasteLevel'));
        $this->assertTrue(method_exists($object, 'setTasteLevel'));
    }

    /**
     * Ckeck if set methods are fluent
     * @return Picnic
     */
    public function testSetMethodsAreFluent()
    {
        $object = new Picnic();

        $this->assertInstanceOf(Picnic::class, $object->setName('Picnic Name'));
        $this->assertInstanceOf(Picnic::class, $object->setTasteLevel(1));

        return $object;
    }

    /**
     * Check get is equal in set methods
     * @param Picnic $object
     * @depends testSetMethodsAreFluent
     */
    public function testGetMethods(Picnic $object)
    {
        $this->assertEquals('Picnic Name', $object->getName());
        $this->assertEquals(1, $object->getTasteLevel());
    }
}
