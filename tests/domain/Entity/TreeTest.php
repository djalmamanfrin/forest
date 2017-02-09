<?php

declare(strict_types = 1);

namespace Tests\Domain\Entity;

use Domain\Entity\Bear;
use Tests\TestCase;
use Domain\Entity\Tree;

/**
 * Class TreeTest
 * @package Tests\Domain\Entity
 */
class TreeTest extends TestCase
{
    /**
     * Check if entity class exist in Domain\Entity
     */
    public function testEntityExist()
    {
        $this->assertInstanceOf(Tree::class, new Tree());
    }

    /**
     * Check if methods exist in entity
     */
    public function testMethodsExistsInEntity()
    {
        $object = new Tree();

        $this->assertTrue(method_exists($object, 'getType'));
        $this->assertTrue(method_exists($object, 'setType'));

        $this->assertTrue(method_exists($object, 'getAge'));
        $this->assertTrue(method_exists($object, 'setAge'));

        $this->assertTrue(method_exists($object, 'getBear'));
        $this->assertTrue(method_exists($object, 'setBear'));
    }

    /**
     * Check if set methods are fluent
     * @return Tree
     */
    public function testSetMethodsAreFluent()
    {
        $bear = $this->getMockBuilder(Bear::class)->getMock();
        $object = new Tree();

        $this->assertInstanceOf(Tree::class, $object->setType('Tree Type'));
        $this->assertInstanceOf(Tree::class, $object->setAge(1));
        $this->assertInstanceOf(Tree::class, $object->setBear($bear));

        return $object;
    }

    /**
     * Check get is equal in set methods
     * @param Tree $object
     * @depends testSetMethodsAreFluent
     */
    public function testGetMethods(Tree $object)
    {
        $this->assertInstanceOf(Bear::class, $object->getBear());
        $this->assertEquals(1, $object->getAge());
        $this->assertEquals('Tree Type', $object->getType());
    }
}
