<?php

/*
 * This file is part of the Tomeet/laravel-enum.
 *
 * (c) Tomeet <tomeet@sohu.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Tomeet\Enum\Laravel\Providers;

class LumenServiceProvider extends LaravelServiceProvider
{
    public function boot()
    {
        parent::boot();

        $this->app->configure('enum');
    }

    protected function setupConfig()
    {
        $path = dirname(__DIR__, 2).'/config/enum.php';

        $this->mergeConfigFrom($path, 'enum');
    }
}
