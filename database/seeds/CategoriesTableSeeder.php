<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Тест 1',
            'url' => 'test1'
        ]);
        DB::table('categories')->insert([
            'name' => 'Тест 2',
            'url' => 'test2'
        ]);
        DB::table('categories')->insert([
            'name' => 'Тест 3',
            'url' => 'test3'
        ]);
    }
}
