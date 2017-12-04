<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\Customer::class, 10)->create();
        factory(App\Model\Ask::class, 10)->create();
        factory(App\Model\Answere::class, 10)->create();
        factory(App\Model\Like::class, 10)->create();
    }
}
