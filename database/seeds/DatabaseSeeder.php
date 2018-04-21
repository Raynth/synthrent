<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        DB::table('products')->insert([
            'category_id' => 1,
            'product_mark_id' => 1,
            'product_name' => str_random(10),
            'rent_money' => 1.25,
            'description' => str_random(10),
            'details' => str_random(10),
            'cover_image' => 'noimage.jpg',
            'online' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'product_mark_id' => 1,
            'product_name' => str_random(10),
            'rent_money' => 1.25,
            'description' => str_random(10),
            'details' => str_random(10),
            'cover_image' => 'noimage.jpg',
            'online' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'product_mark_id' => 1,
            'product_name' => str_random(10),
            'rent_money' => 1.25,
            'description' => str_random(10),
            'details' => str_random(10),
            'cover_image' => 'noimage.jpg',
            'online' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'product_mark_id' => 1,
            'product_name' => str_random(10),
            'rent_money' => 1.25,
            'description' => str_random(10),
            'details' => str_random(10),
            'cover_image' => 'noimage.jpg',
            'online' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'product_mark_id' => 1,
            'product_name' => str_random(10),
            'rent_money' => 1.25,
            'description' => str_random(10),
            'details' => str_random(10),
            'cover_image' => 'noimage.jpg',
            'online' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'product_mark_id' => 1,
            'product_name' => str_random(10),
            'rent_money' => 1.25,
            'description' => str_random(10),
            'details' => str_random(10),
            'cover_image' => 'noimage.jpg',
            'online' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'product_mark_id' => 1,
            'product_name' => str_random(10),
            'rent_money' => 1.25,
            'description' => str_random(10),
            'details' => str_random(10),
            'cover_image' => 'noimage.jpg',
            'online' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'product_mark_id' => 1,
            'product_name' => str_random(10),
            'rent_money' => 1.25,
            'description' => str_random(10),
            'details' => str_random(10),
            'cover_image' => 'noimage.jpg',
            'online' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'product_mark_id' => 1,
            'product_name' => str_random(10),
            'rent_money' => 1.25,
            'description' => str_random(10),
            'details' => str_random(10),
            'cover_image' => 'noimage.jpg',
            'online' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'product_mark_id' => 1,
            'product_name' => str_random(10),
            'rent_money' => 1.25,
            'description' => str_random(10),
            'details' => str_random(10),
            'cover_image' => 'noimage.jpg',
            'online' => 1
        ]);
    }
}
