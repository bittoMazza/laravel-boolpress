<?php

use App\Model\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['io','pasta','papere','divertente','ciao','2022','treni','viral'];

        foreach($tags as $tag){
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->save();
        }
    }
}
