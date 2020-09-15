<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Console\Command;

class PublishTimedPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:publishtimedpost';

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
        $posts = Post::where('published_at', '<=', Carbon::now())->where('status', 2)->get();
        foreach ($posts as $post) {
            $post->status = 1;
            $post->save();

            $this->info('İşlem Tamamlandı');
        }
    }
}
