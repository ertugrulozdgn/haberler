<?php

namespace App\Widgets\Web;

use App\Data\PageData;
use App\Models\Page;
use Arrilot\Widgets\AbstractWidget;


class footer extends AbstractWidget
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
        $pages = PageData::footer();

        return view('web.widgets.footer', compact('pages'));
    }
}
