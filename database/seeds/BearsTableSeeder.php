<?php

use App\Models\Bear;
use App\Models\Picnic;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \InvalidArgumentException
     */
    public function run()
    {
        factory(Bear::class, 10)->create();
    }
}
