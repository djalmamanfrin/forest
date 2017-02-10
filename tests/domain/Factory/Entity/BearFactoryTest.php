<?php

declare(strict_types = 1);

namespace Test\Domain\Factory;

use Domain\Entity\Bear;
use Domain\Factory\BearFactory;
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
     * Faker attribute
     */
    public function setUp()
    {
        parent::setUp();

        $faker = Factory::create('pt_BR');

        $this->request = [
            'id' => $faker->randomDigitNotNull,
            'name' => $faker->name,
            'type' => $faker->colorName,
            'danger_level' => $faker->randomDigitNotNull,
            'created_at' => $faker->date(),
            'updated_at' => $faker->date(),
            'deleted_at' => $faker->date()
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
     *
     */
}
