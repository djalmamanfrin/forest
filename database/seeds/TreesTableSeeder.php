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
        factory(Tree::class, 10)->create();
    }
}
