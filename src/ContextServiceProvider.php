<?php

namespace Sa\Context;

use Illuminate\Support\ServiceProvider;
use Sa\Context\Core\CoreContext;
use Sa\Context\Core\ContextManager;

/**
 * Created by PhpStorm.
 * User: sergii
 * Date: 20.04.17
 * Time: 09:18
 */
class ContextServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('context', function () {
            return new ContextManager([
                CoreContext::getType() => CoreContext::class
            ]);
        });

        $this->app->singleton(CoreContext::class, function () {
            return new CoreContext;
        });

    }

}