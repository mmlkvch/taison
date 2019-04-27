<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
           'name' => 'Samsung Galaxy S9',
           'quantity' => '99',
           'size' => '6.2 inches',
           'code' => 'SGs9',
           'price' => 698.88,
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now()
        ]);
 
        DB::table('products')->insert([
            'name' => 'Apple iPhone X',
            'quantity' => '123',
           	'size' => '5.8 inches',
           	'code' => 'AiPx',
            'price' => 983.00,
            'created_at' => Carbon::now(),
           	'updated_at' => Carbon::now()
        ]);
 
        DB::table('products')->insert([
            'name' => 'Google Pixel 2 XL',
            'quantity' => '123',
           	'size' => '6 inches',
           	'code' => 'GP2X',
            'price' => 675.00,
            'created_at' => Carbon::now(),
           	'updated_at' => Carbon::now()
        ]);
 
        DB::table('products')->insert([
            'name' => 'LG V10 H900',
            'quantity' => '55',
           	'size' => '5.7 inches',
           	'code' => 'LGvh',
            'price' => 159.99,
            'created_at' => Carbon::now(),
           	'updated_at' => Carbon::now()
        ]);
 
        DB::table('products')->insert([
            'name' => 'Huawei Elate',
            'quantity' => '123',
           	'size' => '5.5 inches',
           	'code' => 'HuEl',
            'price' => 68.00,
            'created_at' => Carbon::now(),
           	'updated_at' => Carbon::now()
        ]);
 
        DB::table('products')->insert([
            'name' => 'HTC One M10',
            'quantity' => '123',
           	'size' => '5.2 inches',
           	'code' => 'H1m1',
            'price' => 129.99,
            'created_at' => Carbon::now(),
           	'updated_at' => Carbon::now()
        ]);
    }
}
