<?php

declare(strict_types = 1);

namespace Test\Domain\Repository\Eloquent;

use BearsTableSeeder;
use Domain\Entity\Bear as BearEntity;
use App\Models\Bear;
use Domain\Factory\Entity\BearFactory;
use Domain\Repository\Eloquent\BearRepository;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Artisan;
use Tests\TestCase;

/**
 * Class BearRepositoryTest
 * @package Test\Domain\Repository
 */
class BearRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var Bear
     */
    private $model;

    /**
     * @var BearEntity
     */
    private $entity;

    /**
     * @var array
     */
    private $request;

    /**
     * SetUp
     */
    protected function setUp()
    {
        parent::setUp();

        $this->model = $this->app->make(Bear::class);
        $this->entity = new BearEntity();
        $faker = Factory::create('pt_BR');
        $name = $faker->name;

        $this->request = [
            'id' => $faker->randomDigitNotNull,
            'name' => $name,
            'slug' => str_slug($name),
            'type' => $faker->randomElement([
                'Brown',
                'White',
                'Black'
            ]),
            'danger_level' =>$faker->randomDigitNotNull
        ];
    }

    /**
     * @test Test The Creation Of A New Record
     */
    public function testTheCreationOfANewRecord()
    {
        $repository = new BearRepository($this->model);

        $this->entity->setName($this->request['name']);
        $this->entity->setType($this->request['type']);
        $this->entity->setDangerLevel($this->request['danger_level']);

        $this->assertTrue($repository->create($this->entity));
    }

    /**
     * @test Test existing registry update
     */
    public function testExistingRegistryUpdate()
    {
        Artisan::call('db:seed', [
            '--class' => BearsTableSeeder::class
        ]);

        $repository = new BearRepository($this->model);
        $entity = BearFactory::createFromArray(Bear::find(1)->toArray());

        $entity->setName($this->request['name']);
        $entity->setType($this->request['type']);
        $entity->setDangerLevel($this->request['danger_level']);

        $this->assertTrue($repository->update($entity));

        $entity = BearFactory::createFromArray(Bear::find(1)->toArray());

        $this->assertEquals(1, $entity->getId());
        $this->assertEquals($this->request['name'], $entity->getName());
        $this->assertEquals($this->request['slug'], $entity->getSlug());
        $this->assertEquals($this->request['type'], $entity->getType());
        $this->assertEquals($this->request['danger_level'], $entity->getDangerLevel());
    }
}
