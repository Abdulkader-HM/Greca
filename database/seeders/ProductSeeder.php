<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [1,2,3,4,5,6,7,8,9,10];
        for($x=0;$x<40;$x++)
        {
            DB::table('products')->insert([
                'title'=>fake()->firstName(),
                'type'=>fake()->randomElement($array = array ('electrical','clothes','food','furniture')),
                'description'=>Str::random(20),
                'capacity'=>fake()->randomElement($array = array (1,2,3,4,5,6,7,8,9,10)),
                'created_at'=>now(),
                'updated_at'=>now(),

            ]);
        }
    }
}
