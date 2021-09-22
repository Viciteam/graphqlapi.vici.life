<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Challenge;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ChallengesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Challenge::truncate();
        Challenge::unguard();

        $faker = \Faker\Factory::create();

        User::all()->each(function ($user) use ($faker) {
            foreach (range(1, 5) as $i) {
                Challenge::create([
                    'user_id' => $user->id,
                    'type'   => $faker->sentence,
                    'title'   => $faker->sentence,
                    'tagline'   => $faker->sentence,
                    'description' => $faker->sentence,
                    'privacy'   => $faker->sentence,
                    'duration' => $faker->randomNumber(5, false),
                    'startdate' => $faker->date,
                    'enddate' => $faker->date, 
                ]);
            }
        });
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
