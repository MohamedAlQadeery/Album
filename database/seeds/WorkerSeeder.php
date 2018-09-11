<?php

use App\Worker;
use Illuminate\Database\Seeder;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        foreach (range(0, 10) as $index) {
            Worker::create([
                'name'=>$faker->firstName,
                'email'=>$faker->email,
                'password'=>\Illuminate\Support\Facades\Hash::make('123456')
            ]);
        }
    }
}
