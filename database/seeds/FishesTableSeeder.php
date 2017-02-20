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
        $bear = Bear::pluck('id');

        factory(Fish::class, 10)->make()
            ->each(function ($fish) use ($bear) {
                $fish->bear()->associate($bear->random(1)->first());
                $fish->save();
            });
    }
}
