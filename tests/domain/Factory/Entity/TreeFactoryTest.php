<?php

declare(strict_types = 1);

namespace Test\Domain\Factory\Entity;

use Carbon\Carbon;
use Domain\Entity\Bear;
use Domain\Entity\Tree;
use Faker\Factory;
use Tests\TestCase;
use Domain\Factory\Entity\TreeFactory;

/**
 * Class TreeFactoryTest
 * @package Test\Domain\Factory\Entity
 */
class TreeFactoryTest extends TestCase
{
    /**
     * @var array
     */
    private $request;

    /**
     * Faker attributes
     */
    public function setUp()
    {
        parent::setUp();

        $faker = Factory::create('pt_BR');

        $this->request = [
            'id' => $faker->randomDigitNotNull,
            'bear' => [],
            'age' => $faker->randomDigitNotNull,
            'type' => $faker->colorName,
            'created_at' => $faker->date('Y-m-d H:i:s'),
            'updated_at' => $faker->date('Y-m-d H:i:s'),
            'deleted_at' => $faker->date('Y-m-d H:i:s')
        ];
    }

    /**
     * Check if entity class exist in Domain\Factory
     */
    public function testEntityClassExist()
    {
        $this->assertInstanceOf(TreeFactory::class, new TreeFactory());
    }

    /**
     * Check if methods exists in Domain\Factory
     */
    public function testMethodsExist()
    {
        $object = new TreeFactory();

        $this->assertTrue(method_exists($object, 'createFromArray'));
    }

    /**
     * Check if instance is equal in entity class
     */
    public function testReturnEntityClass()
    {
        $this->assertInstanceOf(Tree::class, TreeFactory::createFromArray($this->request));
    }

    /**
     * Check the return of entity get methods
     */
    public function testReturnOfEntityGetMethods()
    {
        $entity =  TreeFactory::createFromArray($this->request);

        $this->assertEquals($this->request['id'], $entity->getId());
        $this->assertEquals($this->request['age'], $entity->getAge());
        $this->assertEquals($this->request['type'], $entity->getType());

        $this->assertInstanceOf(Bear::class, $entity->getBear());

        $this->assertInstanceOf(Carbon::class, $entity->getCreatedAt());
        $this->assertEquals($this->request['created_at'], $entity->getCreatedAt()->toDateTimeString());

        $this->assertInstanceOf(Carbon::class, $entity->getUpdatedAt());
        $this->assertEquals($this->request['updated_at'], $entity->getUpdatedAt()->toDateTimeString());

        $this->assertInstanceOf(Carbon::class, $entity->getDeletedAt());
        $this->assertEquals($this->request['deleted_at'], $entity->getDeletedAt()->toDateTimeString());
    }
}
