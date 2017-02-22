<?php

declare(strict_types = 1);

namespace Test\Domain\Factory\Entity;

use Carbon\Carbon;
use Domain\Entity\Bear;
use Domain\Entity\BearPicnic;
use Domain\Entity\Picnic;
use Domain\Factory\Entity\BearPicnicFactory;
use Faker\Factory;
use Tests\TestCase;

/**
 * Class BearPicnicFactoryTest
 * @package Test\Domain\Factory\Entity
 */
class BearPicnicFactoryTest extends TestCase
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
            'picnic' => [],
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
        $this->assertInstanceOf(BearPicnicFactory::class, new BearPicnicFactory());
    }

    /**
     * Check if methods exists in Domain\Factory
     */
    public function testMethodsExist()
    {
        $object = new BearPicnicFactory();

        $this->assertTrue(method_exists($object, 'createFromArray'));
    }

    /**
     * Check if instance is equal in entity class
     */
    public function testReturnEntityClass()
    {
        $this->assertInstanceOf(BearPicnic::class, BearPicnicFactory::createFromArray($this->request));
    }

    /**
     * Check the return of entity get methods
     */
    public function testReturnOfEntityGetMethods()
    {
        $entity =  BearPicnicFactory::createFromArray($this->request);

        $this->assertEquals($this->request['id'], $entity->getId());

        $this->assertInstanceOf(Bear::class, $entity->getBear());
        $this->assertInstanceOf(Picnic::class, $entity->getPicnic());

        $this->assertInstanceOf(Carbon::class, $entity->getCreatedAt());
        $this->assertEquals($this->request['created_at'], $entity->getCreatedAt()->toDateTimeString());

        $this->assertInstanceOf(Carbon::class, $entity->getUpdatedAt());
        $this->assertEquals($this->request['updated_at'], $entity->getUpdatedAt()->toDateTimeString());

        $this->assertInstanceOf(Carbon::class, $entity->getDeletedAt());
        $this->assertEquals($this->request['deleted_at'], $entity->getDeletedAt()->toDateTimeString());
    }
}
