<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            'mainpage_title' => 'AnaSayfa Başlık',
            'facebook' => 'Facebook Adresi',
            'twitter' => 'Twitter Adresi',
            'youtube' => 'Youtube Adresi',
            'mainpage_description' => 'Anasayfa Açıklama',
        ];

        foreach($settings as $key => $name) {
            $s = new Setting();
            $s->key = $key;
            $s->name = $name;
            $s->save();
        }
    }
}
