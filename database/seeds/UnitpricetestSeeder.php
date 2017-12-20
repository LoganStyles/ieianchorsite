<?php

use Illuminate\Database\Seeder;

class UnitpricetestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Unitpricestest::truncate();//truncate existing records
        
        $faker = \Faker\Factory::create();
        
        //create a few prices
        for($i=0;$i < 50;$i++){
            App\Unitpricestest::create([
                'rsa'=>$faker->randomDigit,
                'retiree'=>$faker->randomDigit
            ]);
        }
    }
}
