<?php

declare(strict_types=1);

namespace Ctrlc\RestaurantMenu\Tests\Feature;

use Ctrlc\RestaurantMenu\Models\Menu;
use Ctrlc\RestaurantMenu\Tests\TestCase;
use Ctrlc\RestaurantMenu\Tests\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MenuForDaysTest extends TestCase
{
    use RefreshDatabase;

    public User $menuable;

    protected function setUp(): void
    {
        parent::setUp();
        $this->menuable = User::factory()->create();
    }

    public function test_correct_number_of_menus_during_5_days(): void
    {
        $now = now();
        $menus = Menu::factory()
            ->count(5)
            ->create()
            ->each(function (Menu $menu) use ($now) {
                $date = $now->copy();
                $menu->makeActiveOnDay($date);
                $now->addDay();
            });

        $this->menuable->menus()->saveMany($menus);

        $nextDaysMenu = $this->menuable->menusForDays(5, now()->startOfDay())->get();

        self::assertCount(5, $nextDaysMenu);
    }

    public function test_correct_number_of_menus_during_10_days(): void
    {
        $now = now();
        $menus = Menu::factory()
            ->count(10)
            ->create()
            ->each(function (Menu $menu) use ($now) {
                $date = $now->copy();
                $menu->makeActiveOnDay($date);
                $now->addDay();
            });

        $this->menuable->menus()->saveMany($menus);

        $nextDaysMenu = $this->menuable->menusForDays(5, now()->startOfDay())->get();

        self::assertCount(5, $nextDaysMenu);
    }

    public function test_correct_today_menu(): void
    {
        $now = now();
        $menus = Menu::factory()
            ->count(10)
            ->create()
            ->each(function (Menu $menu) use ($now) {
                $date = $now->copy();
                $menu->makeActiveOnDay($date);
                $now->addDay();
            });

        $this->menuable->menus()->saveMany($menus);
        $todayMenu = $this->menuable->menuToday();

        self::assertSame($menus[0]->id, $todayMenu->id);
    }

    public function test_not_existing_today_menu(): void
    {
        $now = now()->addDay();
        $menus = Menu::factory()
            ->count(10)
            ->create()
            ->each(function (Menu $menu) use ($now) {
                $date = $now->copy();
                $menu->makeActiveOnDay($date);
                $now->addDay();
            });

        $this->menuable->menus()->saveMany($menus);
        $todayMenu = $this->menuable->menuToday();

        self::assertSame(null, $todayMenu?->id);
    }
}
