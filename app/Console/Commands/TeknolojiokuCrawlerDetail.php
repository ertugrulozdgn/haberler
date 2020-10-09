<?php

namespace App\Console\Commands;

use App\Models\CrawlerPost;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use voku\helper\HtmlDomParser;

class TeknolojiokuCrawlerDetail extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler:teknolojiokudetail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $base_url = 'https://www.teknolojioku.com';
        // $html = HtmlDomParser::file_get_html($base_url);
        // $link = $html->find('article[class=box-4]');
        // foreach ($link->find('a') as $element) {
        //     $a = $element->href;
        //     dd($a);
        // }

        // $base_url = 'https://www.teknolojioku.com/mobil/yok-artik-apple-kendi-kendini-onaran-ekran-yapiyor-5f7d704aa5ac226d4d6d3407';
        // $html = HtmlDomParser::file_get_html($base_url);
        // $detail = $html->find('div[class=content-text]', 0);
        // dd($detail->innertext);
        // foreach($detail->find('p') as $content) {
        //     $a = $content->text();
        //     dd($a);
        // }

        //$posts = CrawlerPost::pluck('link')->toArray();

        $posts = CrawlerPost::get();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $post_link = $post->link;
                $html = HtmlDomParser::file_get_html($post_link);
                $summary = $html->find('h2')->innerText();
                $summary = strip_tags($summary[0]);
                $image = $html->find('bp-image-component')->innerText();
                $image = $image[0];
                $image = Str::afterLast($image, 'lazy-src="');
                $image = Str::before($image, '" style=');
                $image = str_replace('/{mode}/{width}/{height}', '', $image);  
                $content = $html->find('div[class=content-text]', 0)->innerText();
                $content = Str::before($content, ' <p><strong><div');
                
                if ($content) { //figcation değilse
                    $post->image = $image;
                    $post->summary = $summary;
                    $post->content = $content;
                    $post->save();
                    $this->info('İçerik Kayıt Edildi => ' . $post->title);

                } else {
                    $post->status = 0;
                    $post->save();
                    $this->info('Pasife Alındı => ' . $post->title);
                }
            }
        } 
        $this->info('Kayıtlı İçerik Bulunmamaktadır.');


        // $posts = CrawlerPost::get();
        // if (!empty($posts)) {
        //     foreach ($posts as $post) {
        //         $post_link = $post->link;
        //         $html = HtmlDomParser::file_get_html($post_link);
        //         $summary = $html->find('h2')->innerText();
        //         $summary = strip_tags($summary[0]);
        //         $image = $html->find('bp-image-component')->innerText();
        //         $image = $image[0];
        //         $image = Str::afterLast($image, 'lazy-src="');
        //         $image = Str::before($image, '" style=');
        //         $image = str_replace('/{mode}/{width}/{height}', '', $image);        
        //         $content = $html->find('div[class=content-text]', 0)->innerText();
        //         $content = Str::before($content, ' <p><strong><div');
    
        //         if($content) {
        //             $post->image = $image;
        //             $post->summary = $summary;
        //             $post->content = $content;
        //             //$post->save();
        //             //$this->info('İçerik Eklendi => ' . $post->title);
        //             if (!$post->content || !$post->summary || !$post->image) {
        //                 $post->save();
        //                 $this->info('İçerik Eklendi => ' . $post->title);
        //             } else {
        //                 $this->info('Kayıtlı İçerik => ' . $post->title);
        //             }
        //         } else {
        //             $post->status = 0;
        //             $post->save();
        //             $this->info('Pasife Alındı =>' . $post->title);
        //         }     
        //     }
        // } else {
        //     $this->info('Kayıtlı İçerik Bulunmamaktadır.');
        // }
        

             
    }
}
