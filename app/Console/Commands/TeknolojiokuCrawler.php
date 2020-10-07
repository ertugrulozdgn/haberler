<?php

namespace App\Console\Commands;

use App\Models\CrawlerPost;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class TeknolojiokuCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler:teknolojioku';

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
        $base_url = 'https://www.teknolojioku.com/export/rss';

        $response = Http::get($base_url);

        if (!$response->successful()) {
            $this->alert('Teknolojioku Command Error');
            return 1;
        }

        $response_data = $response->body();

        $xml_data = simplexml_load_string($response_data);

        foreach ($xml_data->channel->item as $item) {
            $post = new CrawlerPost();
            $post->site = 'teknolojioku';
            $post->title = (string) $item->title;
            $post->link = (string) $item->link;
            $post->original_id = Str::afterLast($post->link, '-');o
            $post->published_at = new \Date((string)$item->pubDate);
            if (CrawlerPost::where('site', 'teknolojioku')->where('original_id', $post->original_id)->count() == 0) {
                $post->save();
                $this->info('Kayıt edildi => ' . $post->title);
            } else {
                $this->info('Haber kayıtlı => ' . $post->title);
            }
        }
    }
}
