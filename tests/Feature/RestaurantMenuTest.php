<?php

declare(strict_types=1);

namespace Ctrlc\RestaurantMenu\Tests\Feature;

use Ctrlc\RestaurantMenu\Tests\TestCase;
use Ctrlc\RestaurantMenu\Tests\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RestaurantMenuTest extends TestCase
{
    use RefreshDatabase;

    public User $addressable;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_something(): void
    {
    }
}
