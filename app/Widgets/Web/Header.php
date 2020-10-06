<?php

namespace App\Widgets\Web;

use App\Data\CategoryData;
use App\Models\Category;
use Arrilot\Widgets\AbstractWidget;

class header extends AbstractWidget
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
        $show_categories = CategoryData::menu(1);

        return view('web.widgets.header', compact('show_categories'));
    }
}
