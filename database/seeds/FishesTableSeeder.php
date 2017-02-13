<?php

use App\Models\Bear;
use App\Models\Fish;
use Illuminate\Database\Seeder;

class FishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \InvalidArgumentException
     */
    public function run()
    {
        factory(Fish::class, 10)->create();
    }
}
