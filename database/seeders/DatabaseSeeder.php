<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
        $faker = Faker::create();
        foreach (range(1,50) as $index) {
            
            $gender = $faker->randomElement(['male', 'female']);
            DB::table('clients')->insert([
                'full_name' => $faker->name ,
                'email' => $faker->unique()->email,
                'phone_number' => $faker->phoneNumber,
                'password' => Hash::make('Test123!@#'),
                'property' => 'property'. $faker->randomDigit,
            ]);
        }
    }
}