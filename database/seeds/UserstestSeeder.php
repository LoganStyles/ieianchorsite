<?php

use Illuminate\Database\Seeder;

class UserstestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Userstest::truncate();
        
        $faker = \Faker\Factory::create();
        
        $password = Hash::make('password');
        
        \App\Userstest::create([
            'name'=>'Adminstrator',
            'email'=>'admin@test.com',
            'password'=>$password
        ]);
        
        for($i=0;$i < 10;$i++){
            \App\Userstest::create([
            'name'=>$faker->name,
            'email'=>$faker->email,
            'password'=>$password
        ]);
        }
    }
}
