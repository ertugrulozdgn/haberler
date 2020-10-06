<?php

namespace App\Widgets\Web;

use App\Data\CategoryData;
use App\Data\PageData;
use App\Models\Category;
use Arrilot\Widgets\AbstractWidget;

class Sidemenu extends AbstractWidget
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
        $categories = CategoryData::menu();

        $pages = PageData::footer();

        return view('web.widgets.sidemenu', compact('categories', 'pages'));
    }
}
