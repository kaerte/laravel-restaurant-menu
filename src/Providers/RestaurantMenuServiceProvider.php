<?php

declare(strict_types=1);

namespace Ctrlc\RestaurantMenu\Providers;

use Illuminate\Support\ServiceProvider;

class RestaurantMenuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations/2020_03_29_123134_create_menus_table.php');
    }
}
