<?php

use App\Model\Category;
use App\Model\Post;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        $categories = Category::all();

        for($i = 0;$i < 20;$i ++){
            $newPost = new Post();
            $newPost->category_id = $faker->randomElement($categories)->id;
            $newPost->user_id = $faker->randomElement($users)->id;
            $newPost->title = $faker->realText(35);
            $newPost->thumb = $faker->imageUrl();
            $newPost->post_date = $faker->dateTimeThisYear();
            $newPost->post_content = $faker->realText(200);
            $newPost->save();
        }
    }
}
