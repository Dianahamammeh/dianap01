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
        $gender = $faker->randomElement(['male', 'female']);
        foreach (range(1,200) as $index) {
            DB::table('clients')->insert([
                'full_name' => $faker->full_name($gender),
                'email' => $faker->email,
                'phone_number' => $faker->phone_number,
                'password' => $faker->password,
                'property' => $faker->property,
                
                
            ]);
        }
    }
}