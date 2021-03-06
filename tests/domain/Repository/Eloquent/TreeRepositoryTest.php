<?php

declare(strict_types = 1);

namespace Test\Domain\Repository\Eloquent;

use Artisan;
use App\Models\Tree;
use BearsTableSeeder;
use Domain\Entity\Bear;
use Domain\Entity\Tree as TreeEntity;
use Domain\Factory\Entity\TreeFactory;
use Domain\Repository\Eloquent\TreeRepository;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * Class TreeRepositoryTest
 * @package Test\Domain\Repository\Eloquent
 */
class TreeRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var Tree
     */
    private $model;

    /**
     * @var TreeEntity
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

        $this->model = $this->app->make(Tree::class);
        $this->entity = new TreeEntity();
        $faker =  Factory::create('pt_BR');

        $this->request = [
            'id' => $faker->randomDigitNotNull,
            'type' => $faker->randomElement([
                'Type One',
                'Type Two',
                'Type Three',
                'Type Four',
                'Type Five'
            ]),
            'age' => $faker->randomDigitNotNull
        ];
    }

    /**
     * @test Test existing registry update
     */
    public function testExistingRegistryUpdate()
    {
        Artisan::call('db:seed');

        $repository = new TreeRepository($this->model);
        $bear = $this->getBearRandom();
        $entity = TreeFactory::createFromArray($repository->find(1, ['bear'])->toArray());

        $entity->setType($this->request['type']);
        $entity->setAge($this->request['age']);
        $entity->setBear($bear);

        $this->assertTrue($repository->update($entity));

        $entity = TreeFactory::createFromArray($repository->find(1, ['bear'])->toArray());

        $this->assertEquals(1, $entity->getId());
        $this->assertEquals($this->request['type'], $entity->getType());
        $this->assertEquals($this->request['age'], $entity->getAge());

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

        $repository = new TreeRepository($this->model);
        $bear = $this->getBearRandom();

        $this->entity->setType($this->request['type']);
        $this->entity->setAge($this->request['age']);
        $this->entity->setBear($bear);

        $this->assertTrue($repository->create($this->entity));
        $this->assertEquals(1, $this->entity->getId());
    }
}
