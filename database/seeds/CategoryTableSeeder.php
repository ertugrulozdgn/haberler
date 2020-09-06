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

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => Str::slug($category),
                'seo_title' => $category . ' Haberleri',
                'seo_description' => $category  . ' ile ilgili haberler',
                'show_in_menu' => 1,
                'status' => 1
            ]);
        }
    }
}
