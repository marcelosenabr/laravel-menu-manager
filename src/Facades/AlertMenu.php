<?php

namespace Harimayco\Menu\Facades;

use Illuminate\Support\Facades\Facade;

class AlertMenu extends Facade {
    /**
     * Return facade accessor
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'alert-menu';
    }
}
