<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create(['category'=>'寿司']);
        Genre::create(['category'=>'焼肉']);
        Genre::create(['category'=>'居酒屋']);
        Genre::create(['category'=>'イタリアン']);
        Genre::create(['category'=>'ラーメン']);
    }
}
