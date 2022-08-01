<?php

namespace Database\Seeders;

use Faker\Core\Number;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use function PHPSTORM_META\type;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($x=0;$x<20;$x++)
        {
            DB::table('clients')->insert([
                'first_name'=>fake()->firstName(),
                'last_name'=>fake()->lastName(),
                'email'=>fake()->unique()->safeEmail(),
                'passport_num'=>Str::random(10),
                'gender'=>fake()->randomElement($array = array ('male', 'female')),
                'created_at'=>now(),
                'updated_at'=>now(),

            ]);
        }

    }
}
