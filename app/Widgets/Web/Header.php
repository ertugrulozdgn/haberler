<?php

namespace App\Widgets\Web;

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
        $categories = Category::where('show_in_menu', 1)->get();

        return view('web.widgets.header', compact('categories'));
    }
}
