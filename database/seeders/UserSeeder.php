<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
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

        User::factory()->create([
            'name' => 'ROC Docent',
            'email' => 'info@ROCFlevoland.nl',
            'email_verified_at' => now(),
            'password' => bcrypt('123456789'), // password
            'remember_token' => Str::random(10),
            'role' => 2
        ]);

        for ($i = 1; $i < 30; $i++):
            User::factory()->create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => bcrypt('123456789'), // password
                'remember_token' => Str::random(10),
                'role' => 1
            ]);
        endfor;
    }
}
