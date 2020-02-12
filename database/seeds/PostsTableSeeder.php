<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'category_id' => 1,
            'title' => 'Strictly numerous outlived kindness whatever on we no on addition',
            'text' => 'Strictly numerous outlived kindness whatever on we no on addition. Bed uncommonly his discovered for estimating far. We leaf to snug on no need. Any delicate you how kindness horrible outlived servants. Sportsman do offending supported extremity breakfast by listening. Agreeable promotion eagerness as we resou',
            'img' => '/img/articles/5e43f1d491dbe.jpg'
        ]);
    }
}
