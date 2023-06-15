<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $gender = $faker->randomElement(['male', 'female']);
        foreach (range(1,200) as $index) {
            DB::table('credentials')->insert([
                'id' => $faker->uuid,
                'username' => $faker->username,
                'password' => $faker->password,
                'name' => $faker->name,
                'created_by' => $faker->date
            ]);
        }
    }
}
