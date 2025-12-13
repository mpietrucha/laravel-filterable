<?php

namespace Mpietrucha\Laravel\Filterable\Providers;

use Mpietrucha\Laravel\Package\Builder;

class ServiceProvider extends \Mpietrucha\Laravel\Package\ServiceProvider
{
    public function configure(Builder $package): void
    {
        $package->name('mpietrucha-filterable');

        $package->hasTranslations();
    }
}
