<?php

namespace App\Widgets\Web;

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
        return view('web.widgets.header');
    }
}
