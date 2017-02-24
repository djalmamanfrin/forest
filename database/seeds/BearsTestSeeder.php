<?php

declare(strict_types = 1);

use Illuminate\Database\Seeder;

/**
 * Class TreesTestSeeder
 */
class BearsTestSeeder extends Seeder
{
    /**
     * Run the database seeds test.
     * @return void
     */
    public function run()
    {
        $this->call(BearsTableSeeder::class);
    }
}
