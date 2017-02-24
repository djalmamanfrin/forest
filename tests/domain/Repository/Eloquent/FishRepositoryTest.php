<?php

declare(strict_types = 1);

namespace Test\Domain\Repository\Eloquent;

use App\Models\Fish;
use BearsTableSeeder;
use Domain\Entity\Fish as FishEntity;
use Artisan;
use Domain\Entity\Bear;
use Domain\Factory\Entity\FishFactory;
use Domain\Repository\Eloquent\FishRepository;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * Class FishRepositoryTest
 * @package Test\Domain\Repository\Eloquent
 */
class FishRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var Fish
     */
    private $model;

    /**
     * @var FishEntity
     */
    private $entity;

    /**
     * @var array
     */
    private $request;

    /**
     * setUp
     */
    protected function setUp()
    {
        parent::setUp();

        $this->model = $this->app->make(Fish::class);
        $this->entity = new FishEntity();
        $faker =  Factory::create('pt_BR');

        $this->request = [
            'id' => $faker->randomDigitNotNull,
            'weight' => $faker->randomDigitNotNull
        ];
    }

    /**
     * @test Test existing registry update
     */
    public function testExistingRegistryUpdate()
    {
        Artisan::call('db:seed');

        $repository = new FishRepository($this->model);
        $bear = $this->getBearRandom();
        $entity = FishFactory::createFromArray($repository->find(1, ['bear'])->toArray());

        $entity->setWeight($this->request['weight']);;
        $entity->setBear($bear);

        $this->assertTrue($repository->update($entity));

        $entity = FishFactory::createFromArray($repository->find(1, ['bear'])->toArray());

        $this->assertEquals(1, $entity->getId());
        $this->assertEquals($this->request['weight'], $entity->getWeight());

        $this->assertInstanceOf(Bear::class, $entity->getBear());
        $this->assertEquals($bear->getId(), $entity->getBear()->getId());
    }

    /**
     * @test Test The Creation Of A New Record
     */
    public function testTheCreationOfANewRecord()
    {
        Artisan::call('db:seed', [
            '--class' => BearsTableSeeder::class
        ]);

        $repository = new FishRepository($this->model);
        $bear = $this->getBearRandom();

        $this->entity->setWeight($this->request['weight']);
        $this->entity->setBear($bear);

        $this->assertTrue($repository->create($this->entity));
        $this->assertEquals(1, $this->entity->getId());
    }
}
