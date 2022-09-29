<?php

use App\Model\Post;
use App\Model\Tag;
use Illuminate\Database\Seeder;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            /* Prendiamo 3 tag randomici  */
            $randomTags = Tag::inRandomOrder()->limit(3)->get();
            /* Di ogni tag dobbiamo prendere l'id per assegnarli nella tabella condivisa */
            foreach($randomTags as $randomTag){
                $post->tags()->attach($randomTag->id);
            }            
        }
    }
}
