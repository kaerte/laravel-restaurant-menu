<?php

declare(strict_types=1);

namespace Ctrlc\RestaurantMenu\Tests\Feature;

use Ctrlc\RestaurantMenu\Models\Allergen;
use Ctrlc\RestaurantMenu\Models\Dish;
use Ctrlc\RestaurantMenu\Models\Menu;
use Ctrlc\RestaurantMenu\Models\Section;
use Ctrlc\RestaurantMenu\Tests\TestCase;
use Ctrlc\RestaurantMenu\Tests\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MenuTest extends TestCase
{
    use RefreshDatabase;

    public User $menuable;

    public Menu $menu;

    protected function setUp(): void
    {
        parent::setUp();
        $this->menu = Menu::factory()
            ->has(
                Section::factory()
                    ->has(
                        Dish::factory()
                            ->has(
                                Allergen::factory()->count(4)
                            )
                            ->count(10)
                    )
                ->count(3)
            )->create();

        $this->menuable = User::factory()->create();
    }

    public function test_menu_has_sections(): void
    {
        self::assertCount(3, $this->menu->sections);
    }

    public function test_section_has_dishes(): void
    {
        self::assertCount(10, $this->menu->sections->first()->dishes);
    }

    public function test_dish_has_allergens(): void
    {
        self::assertCount(4, $this->menu->sections->first()->dishes->first()->allergens);
    }

    public function test_menuable_has_menus(): void
    {
        $menus = Menu::factory()->count(5)->create();
        $this->menuable->menus()->saveMany($menus);

        self::assertCount(5, $this->menuable->menus);
    }

    public function test_menu_has_menuable(): void
    {
        $menus = Menu::factory()->count(5)->create();
        $this->menuable->menus()->saveMany($menus);

        self::assertInstanceOf($this->menuable::class, $menus->first()->fresh()->menuable);
    }
}
