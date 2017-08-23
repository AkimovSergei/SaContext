<?php
/**
 * Created by PhpStorm.
 * User: sergii
 * Date: 20.04.17
 * Time: 09:07
 */

namespace Sa\Context;

use Illuminate\Support\Facades\Facade;

class ContextFacade extends Facade
{
    
    /**
     * Get the registered name of the component
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'context';
    }

}