<?php

namespace Database\Seeders;

use App\Models\Campus;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CampusSeeder extends Seeder
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

        Campus::factory()->create([
            'name'=>'ROC Flevoland',
            'street'=>$faker->streetAddress,
            'house_nr'=>1,
            'zip_code'=>'1234AB',
            'city'=>'Lelystad',
            'email'=>$faker->email,
            'phone_nr'=>$faker->phoneNumber,
        ]);

        Campus::factory()->create([
            'name'=>'ROC Overijssel',
            'street'=>$faker->streetAddress,
            'house_nr'=>1,
            'zip_code'=>'9876EF',
            'city'=>'Zwolle',
            'email'=>$faker->email,
            'phone_nr'=>$faker->phoneNumber,
        ]);
    }
}
