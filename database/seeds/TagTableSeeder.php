<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Samsung',
            'Netflix',
            'Apple',
            'İnstagram',
            'Whatsapp',
            'Apple',
            'İphone'
        ];

        foreach($tags as $tag) {
            $t = new Tag();
            $t->name = $tag;
            $t->slug = Str::slug($tag);
            $t->save();
        }
    }
}
