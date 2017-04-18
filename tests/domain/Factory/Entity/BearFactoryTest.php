<?php

declare(strict_types = 1);

namespace Test\Domain\Factory\Entity;

use Carbon\Carbon;
use Domain\Entity\Bear;
use Domain\Factory\Entity\BearFactory;
use Faker\Factory;
use Tests\TestCase;

/**
 * Class BearfactoryTest
 * @package Test\Domain\Factory
 */
class BearFactoryTest extends TestCase
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
        $name = $faker->name;

        $this->request = [
            'id' => $faker->randomDigitNotNull,
            'name' => $name,
            'slug' => $this->slug($name),
            'type' => $faker->colorName,
            'danger_level' => $faker->randomDigitNotNull,
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
        $this->assertInstanceOf(BearFactory::class, new BearFactory());
    }

    /**
     * Check if methods exists in Domain\Factory
     */
    public function testMethodsExist()
    {
        $object = new BearFactory();

        $this->assertTrue(method_exists($object, 'createFromArray'));
    }

    /**
     * Check if instance is equal in entity class
     */
    public function testReturnEntityClass()
    {
        $this->assertInstanceOf(Bear::class, BearFactory::createFromArray($this->request));
    }

    /**
     * Check the return of entity get methods
     */
    public function testReturnOfEntityGetMethods()
    {
        $entity =  BearFactory::createFromArray($this->request);

        $this->assertEquals($this->request['id'], $entity->getId());
        $this->assertEquals($this->request['name'], $entity->getName());
        $this->assertEquals($this->request['slug'], $entity->getSlug());
        $this->assertEquals($this->request['type'], $entity->getType());
        $this->assertEquals($this->request['danger_level'], $entity->getDangerLevel());

        $this->assertInstanceOf(Carbon::class, $entity->getCreatedAt());
        $this->assertEquals($this->request['created_at'], $entity->getCreatedAt()->toDateTimeString());

        $this->assertInstanceOf(Carbon::class, $entity->getUpdatedAt());
        $this->assertEquals($this->request['updated_at'], $entity->getUpdatedAt()->toDateTimeString());

        $this->assertInstanceOf(Carbon::class, $entity->getDeletedAt());
        $this->assertEquals($this->request['deleted_at'], $entity->getDeletedAt()->toDateTimeString());
    }
}
