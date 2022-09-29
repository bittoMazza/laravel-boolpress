<?php

use App\Model\Categorie;
use App\Model\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = [
            'php',
            'js',
            'pasta',
            'riso',
            'legno',
            'broccoli',
            'papere',
        ];

        for ($i=0; $i < count($categories); $i++) { 
            $category = new Category();           
            $category->name = $categories[$i];
            $category->color = $faker->hexColor();
            $category->save();
        }
    }
}
