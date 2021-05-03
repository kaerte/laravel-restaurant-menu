<?php

declare(strict_types=1);

namespace Ctrlc\RestaurantMenu\Providers;

use Illuminate\Support\ServiceProvider;

class RestaurantMenuServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(dirname(__DIR__, 2).'/config/config.php', 'ctrlc.address');
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations/2020_01_01_000001_create_orders_table.php');
    }
}
