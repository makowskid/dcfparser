<?php

namespace makowskid\DcfParser\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class DcfParserFacadeAccessor
 *
 * @author  Dawid Makowski <dawid.makowski@gmail.com>
 */
class DcfParserFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'dcfparser';
    }
}
