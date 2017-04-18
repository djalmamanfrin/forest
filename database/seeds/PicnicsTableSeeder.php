<?php

use App\Models\Bear;
use App\Models\Picnic;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PicnicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \InvalidArgumentException
     */
    public function run()
    {
        $bears = Bear::pluck('id');

        factory(Picnic::class, 10)->make()
            ->each(function ($picnic) use ($bears) {
                $picnic->save();
                $picnic->bears()->attach($bears, [
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            });
    }
}
