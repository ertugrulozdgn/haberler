<?php

namespace App\Widgets\Web;

use App\Data\PostData;
use App\Models\Post;
use Arrilot\Widgets\AbstractWidget;

class viewed extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $posts_viewed = PostData::list([
            'filters' => [
                'show_on_mainpage' => 1,
            ],
            'order_by' => ['hit', 'desc'],
            'count' => 6
        ]);

        return view('web.widgets.viewed', compact('posts_viewed'));
    }
}
