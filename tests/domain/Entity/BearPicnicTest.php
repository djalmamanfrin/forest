<?php

declare(strict_types = 1);

namespace Tests\Domain\Entity;

use Domain\Entity\Bear;
use Domain\Entity\Picnic;
use Tests\TestCase;
use Domain\Entity\BearPicnic;

/**
 * Class BearPicnicTest
 * @package Tests\Domain\Entity
 */
class BearPicnicTest extends TestCase
{
    /**
     * Check if entity class exist in Domain\Entity
     */
    public function testEntityExist()
    {
        $this->assertInstanceOf(BearPicnic::class, new BearPicnic());
    }

    /**
     * Check if methods exist in entity
     */
    public function testMethodsExistsInEntity()
    {
        $object = new BearPicnic();

        $this->assertTrue(method_exists($object, 'getPicnic'));
        $this->assertTrue(method_exists($object, 'setPicnic'));

        $this->assertTrue(method_exists($object, 'getBear'));
        $this->assertTrue(method_exists($object, 'setBear'));
    }

    /**
     * Check if set methods are fluent
     * @return BearPicnic
     */
    public function testSetMethodsAreFluent()
    {
        $bear = $this->getMockBuilder(Bear::class)->getMock();
        $picnic = $this->getMockBuilder(Picnic::class)->getMock();
        $object = new BearPicnic();

        $this->assertInstanceOf(BearPicnic::class, $object->setPicnic($picnic));
        $this->assertInstanceOf(BearPicnic::class, $object->setBear($bear));

        return $object;
    }

    /**
     * Check get is equal in set methods
     * @param BearPicnic $object
     * @depends testSetMethodsAreFluent
     */
    public function testGetMethods(BearPicnic $object)
    {
        $this->assertInstanceOf(Bear::class, $object->getBear());
        $this->assertInstanceOf(Picnic::class, $object->getPicnic());
    }
}
