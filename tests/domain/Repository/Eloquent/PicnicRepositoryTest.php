<?php

declare(strict_types = 1);

namespace Test\Domain\Repository\Eloquent;

use Artisan;
use App\Models\Picnic;
use Domain\Entity\Picnic as PicnicEntity;
use Domain\Factory\Entity\PicnicFactory;
use Domain\Repository\Eloquent\PicnicRepository;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PicnicsTableSeeder;
use Tests\TestCase;

/**
 * Class PicnicRepositoryTest
 * @package Test\Domain\Repository\Eloquent
 */
class PicnicRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var Picnic
     */
    private $model;

    /**
     * @var PicnicEntity
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

        $this->model = $this->app->make(Picnic::class);
        $this->entity = new PicnicEntity();
        $faker = Factory::create('pt_BR');

        $this->request = [
            'name' => $faker->randomElement([
                'Great Smoky Mountains',
                'Yosemit',
                'Olympic',
                'Sequoia and Kings Canyon national parks',
                'Redwood national and state parks',
            ]),
            'taste_level' => $faker->randomDigitNotNull
        ];
    }

    /**
     * @test Test The Creation Of A New Record
     */
    public function testTheCreationOfANewRecord()
    {
        $repository = new PicnicRepository($this->model);

        $this->entity->setName($this->request['name']);
        $this->entity->setTasteLevel($this->request['taste_level']);

        $this->assertTrue($repository->create($this->entity));
    }

    /**
     * @test Test existing registry update
     */
    public function testExistingRegistryUpdate()
    {
        Artisan::call('db:seed', [
            '--class' => PicnicsTableSeeder::class
        ]);

        $repository = new PicnicRepository($this->model);
        $entity = PicnicFactory::createFromArray(Picnic::find(1)->toArray());

        $entity->setName($this->request['name']);
        $entity->setTasteLevel($this->request['taste_level']);

        $this->assertTrue($repository->update($entity));

        $entity = PicnicFactory::createFromArray(Picnic::find(1)->toArray());

        $this->assertEquals(1, $entity->getId());
        $this->assertEquals($this->request['name'], $entity->getName());
        $this->assertEquals($this->request['taste_level'], $entity->getTasteLevel());
    }
}
