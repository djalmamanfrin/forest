<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \InvalidArgumentException
     */
    public function run()
    {
        $this->call(BearsTableSeeder::class);
        $this->call(PicnicsTableSeeder::class);
        $this->call(TreesTableSeeder::class);
        $this->call(FishesTableSeeder::class);
    }
}
