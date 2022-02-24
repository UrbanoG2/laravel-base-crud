<?php

use Faker\Generator as Faker;

use Illuminate\Database\Seeder;

use App\Comic;

class ComicSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 100; $i++) { 
            $newComic = new Comic();
            $newComic->title = $faker->words(2,true);
            $newComic->number = $faker->randomNumber(5, false);
            $newComic->price = $faker->randomFloat(2, 1, 50);
            $newComic->description = $faker->text() ;
            $newComic->author = $faker->name();
            
            $newComic->save();
        }
    }
}
