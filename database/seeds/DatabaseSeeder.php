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
            'merk_id' => 1,
            'naam' => str_random(10),
            'huurprijs' => 1.25,
            'omschrijving' => str_random(10),
            'details' => str_random(10),
            'foto' => 'noimage.jpg',
            'online' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'merk_id' => 1,
            'naam' => str_random(10),
            'huurprijs' => 1.25,
            'omschrijving' => str_random(10),
            'details' => str_random(10),
            'foto' => 'noimage.jpg',
            'online' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'merk_id' => 1,
            'naam' => str_random(10),
            'huurprijs' => 1.25,
            'omschrijving' => str_random(10),
            'details' => str_random(10),
            'foto' => 'noimage.jpg',
            'online' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'merk_id' => 1,
            'naam' => str_random(10),
            'huurprijs' => 1.25,
            'omschrijving' => str_random(10),
            'details' => str_random(10),
            'foto' => 'noimage.jpg',
            'online' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'merk_id' => 1,
            'naam' => str_random(10),
            'huurprijs' => 1.25,
            'omschrijving' => str_random(10),
            'details' => str_random(10),
            'foto' => 'noimage.jpg',
            'online' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'merk_id' => 1,
            'naam' => str_random(10),
            'huurprijs' => 1.25,
            'omschrijving' => str_random(10),
            'details' => str_random(10),
            'foto' => 'noimage.jpg',
            'online' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'merk_id' => 1,
            'naam' => str_random(10),
            'huurprijs' => 1.25,
            'omschrijving' => str_random(10),
            'details' => str_random(10),
            'foto' => 'noimage.jpg',
            'online' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'merk_id' => 1,
            'naam' => str_random(10),
            'huurprijs' => 1.25,
            'omschrijving' => str_random(10),
            'details' => str_random(10),
            'foto' => 'noimage.jpg',
            'online' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'merk_id' => 1,
            'naam' => str_random(10),
            'huurprijs' => 1.25,
            'omschrijving' => str_random(10),
            'details' => str_random(10),
            'foto' => 'noimage.jpg',
            'online' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'merk_id' => 1,
            'naam' => str_random(10),
            'huurprijs' => 1.25,
            'omschrijving' => str_random(10),
            'details' => str_random(10),
            'foto' => 'noimage.jpg',
            'online' => 1
        ]);
    }
}
