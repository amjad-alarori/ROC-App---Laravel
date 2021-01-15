<?php

namespace Database\Seeders;

use App\Models\StageBedrijven;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class StageBedrijvenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = new Factory();
        $faker = $factory->create();

        for ($i = 1; $i < 20; $i++):
            StageBedrijven::factory()
                ->for(User::factory())
                ->create([
                    'name' => $faker->company,
                    'address' => $faker->address,
                    'zip_code' => $faker->postcode,
                    'city' => $faker->city,
                    'email' => $faker->email,
                    'phone_nr' => $faker->phoneNumber,
                ]);
        endfor;
    }
}
