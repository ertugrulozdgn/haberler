<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Güncel',
            'Oyun',
            'Mobil',
            'Otomobil',
            'Donanım',
            'Bilim & Teknik',
            'Sosyal Medya',
            'İnceleme',
            'Sinema',
            'Yazılım',
            'İnternet',
            'Güvenlik',
            'Eğitim',
            'Nasıl Yapılır'
        ];

        foreach($categories as $category) {
            $c = new Category();
            $c->name = $category;
            $c->slug = Str::slug($category);
            $c->seo_title = $category . ' Haberleri';
            $c->seo_description = $category  . ' ile ilgili haberler';
            $c->show_in_menu = 1;
            $c->status = 1;
            $c->save();
        }

        // foreach ($categories as $category) {     böyle yapabilmek için fillable tanımlamak gerek modele
        //     Category::create([
        //         'name' => $category,
        //         'slug' => Str::slug($category),
        //         'seo_title' => $category . ' Haberleri',
        //         'seo_description' => $category  . ' ile ilgili haberler',
        //         'show_in_menu' => 1,
        //         'status' => 1
        //     ]);
        // }

    }
}
