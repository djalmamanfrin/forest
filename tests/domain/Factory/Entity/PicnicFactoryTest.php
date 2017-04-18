<?php

declare(strict_types = 1);

namespace Test\Domain\Factory\Entity;

use Carbon\Carbon;
use Domain\Entity\Picnic;
use Faker\Factory;
use Tests\TestCase;
use Domain\Factory\Entity\PicnicFactory;

/**
 * Class PicnicFactoryTest
 * @package Test\Domain\Factory\Entity
 */
class PicnicFactoryTest extends TestCase
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
            'taste_level' => $faker->randomDigitNotNull,
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
        $this->assertInstanceOf(PicnicFactory::class, new PicnicFactory());
    }

    /**
     * Check if methods exists in Domain\Factory
     */
    public function testMethodsExist()
    {
        $object = new PicnicFactory();

        $this->assertTrue(method_exists($object, 'createFromArray'));
    }

    /**
     * Check if instance is equal in entity class
     */
    public function testReturnEntityClass()
    {
        $this->assertInstanceOf(Picnic::class, PicnicFactory::createFromArray($this->request));
    }

    /**
     * Check the return of entity get methods
     */
    public function testReturnOfEntityGetMethods()
    {
        $entity =  PicnicFactory::createFromArray($this->request);

        $this->assertEquals($this->request['id'], $entity->getId());
        $this->assertEquals($this->request['name'], $entity->getName());
        $this->assertEquals($this->request['taste_level'], $entity->getTasteLevel());

        $this->assertInstanceOf(Carbon::class, $entity->getCreatedAt());
        $this->assertEquals($this->request['created_at'], $entity->getCreatedAt()->toDateTimeString());

        $this->assertInstanceOf(Carbon::class, $entity->getUpdatedAt());
        $this->assertEquals($this->request['updated_at'], $entity->getUpdatedAt()->toDateTimeString());

        $this->assertInstanceOf(Carbon::class, $entity->getDeletedAt());
        $this->assertEquals($this->request['deleted_at'], $entity->getDeletedAt()->toDateTimeString());
    }
}
