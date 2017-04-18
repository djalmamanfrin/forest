<?php

use App\Models\Bear;
use App\Models\Tree;
use Illuminate\Database\Seeder;

class TreesTableSeeder extends Seeder
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

        factory(Tree::class, 10)->make()
            ->each(function ($tree) use ($bear) {
                $tree->bear()->associate($bear->random(1)->first());
                $tree->save();
            });
    }
}
