<?php

declare(strict_types = 1);

namespace Tests\Domain\Entity;

use Domain\Entity\Bear;
use Tests\TestCase;
use Domain\Entity\Fish;

/**
 * Class Fish
 * @package Tests\Domain\Entity
 */
class FishTest extends TestCase
{
    /**
     * Check if entity class exist in Domain\Entity
     */
    public function testEntityExist()
    {
        $this->assertInstanceOf(Fish::class, new Fish());
    }

    /**
     * Check if entity class has their attribute
     */
    public function testEntityHasAttribute()
    {
        $this->assertObjectHasAttribute('weight', new Fish());
        $this->assertObjectHasAttribute('bear', new Fish());
    }

    /**
     * Check if methods exist in entity
     */
    public function testMethodsExistsInEntity()
    {
        $object = new Fish();

        $this->assertTrue(method_exists($object, 'getWeight'));
        $this->assertTrue(method_exists($object, 'setWeight'));

        $this->assertTrue(method_exists($object, 'getBear'));
        $this->assertTrue(method_exists($object, 'setBear'));
    }

    /**
     * Check if set methods are fluent
     * @return Fish
     */
    public function testSetMethodsAreFluent()
    {
        $bear = $this->getMockBuilder(Bear::class)->getMock();
        $object = new Fish();

        $this->assertInstanceOf(Fish::class, $object->setWeight(1));
        $this->assertInstanceOf(Fish::class, $object->setBear($bear));

        return $object;
    }

    /**
     * Check get is equal in set methods
     * @param Fish $object
     * @depends testSetMethodsAreFluent
     */
    public function testGetMethods(Fish $object)
    {
        $this->assertInstanceOf(Bear::class, $object->getBear());
        $this->assertEquals(1, $object->getWeight());
    }
}
