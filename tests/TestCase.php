<?php

declare(strict_types=1);

namespace Ctrlc\RestaurantMenu\Tests;

use Ctrlc\RestaurantMenu\Providers\RestaurantMenuServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->loadMigrationsFrom(__DIR__.'../database/migrations');
        $this->loadLaravelMigrations();
    }

    protected function getPackageProviders($app): array
    {
        return [RestaurantMenuServiceProvider::class];
    }
}
