<?php

declare(strict_types = 1);

namespace Tests;

use App\Models\Bear;
use Domain\Factory\Entity\BearFactory;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__ . '/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * @param $slug
     * @return string
     */
    public function slug($slug)
    {
        return str_slug($slug);
    }

    /**
     * @return \Domain\Entity\Bear
     */
    protected function getBearRandom()
    {
        $bear = Bear::all();
        return BearFactory::createFromArray($bear->random(1)->first()->toArray());
    }
}
