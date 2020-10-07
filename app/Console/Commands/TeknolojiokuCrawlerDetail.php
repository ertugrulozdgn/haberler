<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
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
        // }

        $base_url = 'https://www.teknolojioku.com/mobil/yok-artik-apple-kendi-kendini-onaran-ekran-yapiyor-5f7d704aa5ac226d4d6d3407';
        $html = HtmlDomParser::file_get_html($base_url);
        $detail = $html->find('div[class=content-text]', 0);
        dd($detail->innertext);
        foreach($detail->find('p') as $content) {
            $a = $content->text();
            dd($a);
        }
    }
}
